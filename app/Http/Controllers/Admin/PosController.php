<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Invoice;
use App\Models\InvoiceAddition;
use App\Models\InvoiceDetails;
use App\Models\Pos;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Shape;
use App\Models\Storage;
use App\Models\StorageTransaction;
use Illuminate\Http\Request;
use Auth;
class PosController extends Controller
{
    public function index(Request $request)
    {
        $Products = Product::where('is_active', 'active')->get();
        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();


        if ($request->ajax()) {
            $view = view('posdata', compact('Products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('admin.pos.pos', compact('Products', 'pos'));
    }

    public function POSProducts(Request $request)
    {
        $posts = Product::Orderby('id', 'asc');
        if (isset($request->category_id) && $request->category_id != 0) {
            $posts->where('category_id', $request->category_id);
        }

        $Products = $posts->get();


        return view('admin.pos.posdata', compact('Products'));
    }

    public function getShapesPos(Request $request)
    {
        $posts = Shape::where('product_id', $request->id)->get();


        return view('admin.pos.getShapesPos', compact('posts'));
    }

    public function POSTable(Request $request)
    {
        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();


        return view('admin.pos.item_table', compact('pos'));
    }

    public function addItem(Request $request)
    {
        $shape = Shape::FindOrFail($request->id);
        $product = Product::findOrFail($shape->product_id);
        if (Pos::where('product_id', $product->id)->where('shape_id', $shape->id)->where('client_id', $request->client_id)->where('admin_id', Auth::guard('admin')->id())->count() > 0) {
            $data = Pos::where('product_id', $product->id)->where('shape_id', $shape->id)->where('client_id', $request->client_id)->where('admin_id', Auth::guard('admin')->id())->first();
            $data->count = $data->count + 1;
            $data->save();
        } else {
            $data = new Pos;
            $data->product_id = $product->id;
            $data->count = 1;
            $data->shape_id = $shape->id;
            $data->client_id = $request->client_id;
            $data->admin_id = Auth::guard('admin')->id();
            $data->save();
        }
        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();

        return view('admin.pos.item_table', compact('pos'));

    }

    public function deleteItem(Request $request)
    {

        Pos::where('id', $request->id)->delete();

        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();

        return view('admin.pos.item_table', compact('pos'));
    }

    public function getDataPos()
    {

        $count = Pos::where('admin_id', Auth::guard('admin')->id())->sum('count');
        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();
        $subPrice = [];
        foreach ($pos as $po) {
            $subPrice[] = $po->Shape->price * $po->count;
        }


        $data['total_price'] = array_sum($subPrice);
        $data['count'] = $count;

        return response()->json($data);

    }

    public function updateDelete(Request $request)
    {

        $data = Pos::Find($request->id);
        $data->count = $request->count;
        $data->save();

        $pos = Pos::where('admin_id', Auth::guard('admin')->id())->get();

        return view('admin.pos.item_table', compact('pos'));

    }

    public function StoreInvoice(Request $request)
    {
        $data = $this->validate(request(), [
            'date' => 'string',

        ]);
        $branch = Branch::findOrFail($request->branch_id);
        if ($request->product_id != null) {
            $invoice = new Invoice();
            $invoice->type = 'outcome';
            $invoice->date = \Carbon\Carbon::now()->format('Y-m-d');
            $invoice->client_id = $request->client_id;
            $invoice->branch_id = $request->branch_id;
            $invoice->created_by = \Illuminate\Support\Facades\Auth::guard('admin')->user()->id;
            $invoice->save();

            // start list of invoices details
            $product_id = $request->product_id;
            $shape_id = $request->shape_id;
            $quantity = $request->count;
            $sell_price = $request->sell_price;

            $total_details = [];
            foreach ($request->product_id as $key => $product) {
                $invoiceDetails = new InvoiceDetails();
                $invoiceDetails->invoice_id = $invoice->id;
                $invoiceDetails->product_id = $product_id[$key];
                $invoiceDetails->shape_id = $shape_id[$key];
                $invoiceDetails->quantity = $quantity[$key];
                $invoiceDetails->sell_price = $sell_price[$key];
                $invoiceDetails->save();


                $storage = Storage::where('branch_id', $request->branch_id)->where('product_id', $product_id[$key])->where('shape_id', $shape_id[$key])->first();
                $quantity_storage = $storage->quantity - $quantity[$key];
                $storage->quantity = $quantity_storage;
                $storage->save();

                $pro = Product::findOrFail($product_id[$key]);
                $storageTransaction = new StorageTransaction;
                $storageTransaction->type = 'outcome';
                $storageTransaction->note = 'تم بيع عدد ' . $quantity[$key] . " من المنتج " . $pro->ar_title . ' من فرع ' . $branch->ar_name;
                $storageTransaction->sell_price = $sell_price[$key];
                $storageTransaction->quantity = $quantity[$key];
                $storageTransaction->branch_id = $request->branch_id;
                $storageTransaction->shape_id = $shape_id[$key];
                $storageTransaction->product_id = $product_id[$key];
                $storageTransaction->invoice_id = $invoice->id;
                $storageTransaction->admin_id = Auth::guard('admin')->id();
                $storageTransaction->save();


                $total_details[] = $quantity[$key] * $sell_price[$key];
            }
            // end list of invoices details
            if (isset($request->tax) || isset($request->delivery_fees) || isset($request->discount) || isset($request->coupon_id)) {
                $invoiceAdditions = new InvoiceAddition();
                $invoiceAdditions->tax = $request->tax;
                $invoiceAdditions->delivery_fees = $request->delivery_fees;
                $invoiceAdditions->discount = $request->discount;
                $invoiceAdditions->coupon_id = $request->coupon_id;
                $invoiceAdditions->invoice_id = $invoice->id;
                $invoiceAdditions->save();
            }
            $subtotal = array_sum($total_details);


            if (isset($request->discount) && $request->discount != 0) {
                $total = $subtotal - (($subtotal * $request->discount) / 100);
            } else {
                $total = $subtotal - (($subtotal * $request->tax) / 100);
            }

            if (isset($request->tax) && $request->tax != 0) {
                $TotalWithTax = $total + (($total * $request->tax) / 100);
            } else {
                $TotalWithTax = $total;
            }

            $invoice->total_price = $TotalWithTax + $request->delivery_fees;
            $invoice->save();

        }

        Pos::where('admin_id',Auth::guard('admin')->id())->delete();
        return redirect(url('PosDetails', $invoice->id));


    }

    public function details($id)
    {
        $employee = Invoice::findOrFail($id);
        $type = $employee->type;
        $settings = Setting::findOrFail(1);
        $amount = $employee->total_price;
        /*        $price = Tafqeet::inArabic($amount,'kwd');*/


        return view('admin.pos.index-invoice', compact(['employee', 'type', 'settings', 'amount']));

    }
}
