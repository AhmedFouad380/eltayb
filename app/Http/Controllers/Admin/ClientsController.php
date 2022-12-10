<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{
    //
    //
    public function index()
    {
        return view('admin.clients.index');
    }
    public function datatable(Request $request)
    {
        $data = Client::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('phone', function ($row) {
                $name = '';
                if ($row->phone != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->phone . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder"> غير معروف</span>';

                }
                return $name;
            })
            ->editColumn('address', function ($row) {
                $name = '';
                if ($row->address != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->address . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder"> غير معروف</span>';

                }
                return $name;
            })
            ->editColumn('email', function ($row) {
                $name = '';
                if ($row->email != null){
                    $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->email . '</span>';

                }else{
                    $name .= ' <span class="badge badge-light-danger fw-bolder"> غير معروف</span>';

                }
                return $name;
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("clients-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name','phone', 'address','email'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',

        ]);


        $client = new Client();
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->address=$request->address;
        $client->email=$request->email;
        $client->save();

        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Client::findOrFail($id);
        return view('admin.clients.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',

        ]);

        $client = Client::whereId($request->id)->firstOrFail();
        $client->name=$request->name;
        $client->phone=$request->phone;
        $client->address=$request->address;
        $client->email=$request->email;
        $client->save();


        return redirect(url('units_Setting'))->with('message', 'تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Client::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
