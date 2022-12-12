<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('front.index');
//});


Route::group(['middleware' => ['HttpsProtocolMiddleware']], function () {

    Route::get('/', [\App\Http\Controllers\frontController::class, 'home']);

    Route::get('product_model', [\App\Http\Controllers\frontController::class, 'product_model']);
    Route::get('product_details/{id}', [\App\Http\Controllers\frontController::class, 'product_details']);
    Route::get('Category/{id}', [\App\Http\Controllers\frontController::class, 'Category']);
    Route::get('/login', function () {
        return view('front.login');
    });
    Route::post('login', [\App\Http\Controllers\frontController::class, 'login']);

    Route::post('registerUser', [\App\Http\Controllers\frontController::class, 'registerUser']);

    Route::get('register', [\App\Http\Controllers\frontController::class, 'register']);
    Route::get('Search', [\App\Http\Controllers\frontController::class, 'Search']);
    Route::get('Hot-Deals', [\App\Http\Controllers\frontController::class, 'HotDeals']);
    Route::get('Contact', [\App\Http\Controllers\frontController::class, 'Contact']);
    Route::get('Page/{id}', [\App\Http\Controllers\frontController::class, 'Page']);

    Route::get('/Admin/Login', function () {
        return view('auth.login');
    });


    Route::group(['middleware' => ['web']], function () {

        Route::get('cart', [\App\Http\Controllers\frontController::class, 'cart']);
        Route::get('add-cart', [\App\Http\Controllers\frontController::class, 'addCart']);
        Route::get('add-wishlist', [\App\Http\Controllers\frontController::class, 'addwishlist']);
        Route::get('deleteWithList', [\App\Http\Controllers\frontController::class, 'deleteWithList']);
        Route::get('wishlist', [\App\Http\Controllers\frontController::class, 'wishlist']);


        Route::get('qty-up', [\App\Http\Controllers\frontController::class, 'qtyUp']);
        Route::get('qty-down', [\App\Http\Controllers\frontController::class, 'qtyUp']);
        Route::get('delete-cart-item', [\App\Http\Controllers\frontController::class, 'deleteCartItem']);
        Route::get('delete-All', [\App\Http\Controllers\frontController::class, 'deleteALl']);
        Route::post('ApplyCoupon', [\App\Http\Controllers\frontController::class, 'ApplyCoupon']);
        Route::get('removeCoupon', [\App\Http\Controllers\frontController::class, 'removeCoupon']);

        Route::get('Profile/{path?}', [\App\Http\Controllers\frontController::class, 'profile']);
        Route::post('UpdateProfile', [\App\Http\Controllers\frontController::class, 'UpdateProfile']);

        Route::post('store-Address', [\App\Http\Controllers\AddressController::class, 'storeAddress']);
        Route::get('viewMap', [\App\Http\Controllers\AddressController::class, 'viewMap']);
        Route::get('EditAddress', [\App\Http\Controllers\AddressController::class, 'editAddress']);
        Route::post('update-Address', [\App\Http\Controllers\AddressController::class, 'UpdateAddress']);
        Route::get('deleteAddress/{id}', [\App\Http\Controllers\AddressController::class, 'deleteAddress']);

        Route::get('logout', [\App\Http\Controllers\frontController::class, 'logout']);
        Route::post('StoreOrder', [\App\Http\Controllers\frontController::class, 'StoreOrder']);


    });
    Route::group(['middleware' => ['admin']], function () {
//employee settings
        Route::get('Dashboard', function () {
            return view('admin.dashboard');
        });
        Route::get('Admin_setting', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
        Route::get('Admin_datatable', [\App\Http\Controllers\Admin\AdminController::class, 'datatable'])->name('Admin.datatable.data');
        Route::get('delete-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'destroy']);
        Route::post('store-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'store']);
        Route::get('Admin-edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'edit']);
        Route::post('update-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'update']);
        Route::get('/add-button-Admin', function () {
            return view('admin/Admin/button');
        });
//employee settings
        Route::get('User_setting', [\App\Http\Controllers\Admin\UsersController::class, 'index']);
        Route::get('User_datatable', [\App\Http\Controllers\Admin\UsersController::class, 'datatable'])->name('User.datatable.data');
        Route::get('delete-User', [\App\Http\Controllers\Admin\UsersController::class, 'destroy']);
        Route::post('store-User', [\App\Http\Controllers\Admin\UsersController::class, 'store']);
        Route::get('User-edit/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'edit']);
        Route::post('update-User', [\App\Http\Controllers\Admin\UsersController::class, 'update']);
        Route::get('/add-button-user', function () {
            return view('admin/User/button');
        });


        Route::get('Categories_Setting', [\App\Http\Controllers\Admin\CategoriesController::class, 'index']);
        Route::get('Categories_datatable', [\App\Http\Controllers\Admin\CategoriesController::class, 'datatable'])->name('Categories.datatable.data');
        Route::get('delete-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'destroy']);
        Route::post('store-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'store']);
        Route::get('Categories-edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'edit']);
        Route::post('update-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'update']);
        Route::get('/add-button-Categories', function () {
            return view('admin/Categories/button');
        });

        Route::get('Page_Setting', [\App\Http\Controllers\Admin\PageController::class, 'index']);
        Route::get('Page_datatable', [\App\Http\Controllers\Admin\PageController::class, 'datatable'])->name('Page.datatable.data');
        Route::get('delete-Page', [\App\Http\Controllers\Admin\PageController::class, 'destroy']);
        Route::post('store-Page', [\App\Http\Controllers\Admin\PageController::class, 'store']);
        Route::get('Page-edit/{id}', [\App\Http\Controllers\Admin\PageController::class, 'edit']);
        Route::post('update-Page', [\App\Http\Controllers\Admin\PageController::class, 'update']);
        Route::get('/add-button-Page', function () {
            return view('admin/Page/button');
        });


        Route::get('Slider_Setting', [\App\Http\Controllers\Admin\SliderController::class, 'index']);
        Route::get('Slider_datatable', [\App\Http\Controllers\Admin\SliderController::class, 'datatable'])->name('Slider.datatable.data');
        Route::get('delete-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'destroy']);
        Route::post('store-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'store']);
        Route::get('Slider-edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit']);
        Route::post('update-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'update']);
        Route::get('/add-button-Slider', function () {
            return view('admin/Slider/button');
        });

        Route::get('Product_Setting', [\App\Http\Controllers\Admin\ProductController::class, 'index']);
        Route::get('Product_datatable', [\App\Http\Controllers\Admin\ProductController::class, 'datatable'])->name('Product.datatable.data');
        Route::get('delete-Product', [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);
        Route::post('store-Product', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
        Route::get('Product-edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit']);
        Route::post('update-Product', [\App\Http\Controllers\Admin\ProductController::class, 'update']);
        Route::get('/add-button-Product', function () {
            return view('admin/Product/button');
        });

        Route::get('get-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'getProducts']);

        Route::get('ProductImages/{id}', [\App\Http\Controllers\Admin\ProductImagesController::class, 'index']);
        Route::get('ProductImages_datatable', [\App\Http\Controllers\Admin\ProductImagesController::class, 'datatable'])->name('ProductImages.datatable.data');
        Route::get('delete-ProductImages', [\App\Http\Controllers\Admin\ProductImagesController::class, 'destroy']);
        Route::post('store-ProductImages', [\App\Http\Controllers\Admin\ProductImagesController::class, 'store']);
        Route::get('/add-button-ProductImages/{id}', function ($id) {
            return view('admin/ProductImages/button', compact('id'));
        });


        Route::get('Storage_Setting/{id?}', [\App\Http\Controllers\Admin\StorageController::class, 'index']);
        Route::get('Storage_datatable', [\App\Http\Controllers\Admin\StorageController::class, 'datatable'])->name('Storage.datatable.data');
        Route::get('delete-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'destroy']);
        Route::post('store-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'store']);
        Route::get('Storage-edit/{id}', [\App\Http\Controllers\Admin\StorageController::class, 'edit']);
        Route::post('update-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'update']);
        Route::get('/add-button-Storage/{id?}', function ($id = null) {
            return view('admin/Storage/button', compact('id'));
        });


        Route::get('get-Shapes/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'getShapes']);
        Route::get('Shapes/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'index']);
        Route::get('Shapes_datatable', [\App\Http\Controllers\Admin\ShapeController::class, 'datatable'])->name('Shapes.datatable.data');
        Route::get('delete-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'destroy']);
        Route::post('store-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'store']);
        Route::get('Shapes-edit/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'edit']);
        Route::post('update-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'update']);
        Route::get('/add-button-Shapes/{id}', function ($id) {
            return view('admin/Shapes/button', compact('id'));
        });


        Route::get('Coupons_Setting', [\App\Http\Controllers\Admin\CouponController::class, 'index']);
        Route::get('Coupons_datatable', [\App\Http\Controllers\Admin\CouponController::class, 'datatable'])->name('Coupons.datatable.data');
        Route::get('delete-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'destroy']);
        Route::post('store-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'store']);
        Route::get('Coupons-edit/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'edit']);
        Route::post('update-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'update']);
        Route::get('/add-button-Coupons', function () {
            return view('admin/Coupons/button');
        });


        Route::get('Orders', [\App\Http\Controllers\Admin\OrderController::class, 'index']);
        Route::get('Restaurants-Orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'Restaurants_Orders']);
        Route::get('User-Orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'User_Orders']);

        Route::get('Order_detail/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'Order_detail']);
        Route::get('Order_datatable', [\App\Http\Controllers\Admin\OrderController::class, 'datatable'])->name('Order.datatable.data');
        Route::get('delete-Order', [\App\Http\Controllers\Admin\OrderController::class, 'destroy']);
        Route::get('/add-button-Order', function () {
            return view('admin/Order/button');
        });
        Route::post('update-Order-states', [\App\Http\Controllers\Admin\OrderController::class, 'updateOrderStates']);


        Route::get('General_Setting', [\App\Http\Controllers\Admin\SettingController::class, 'index']);
        Route::post('edit_setting', [\App\Http\Controllers\Admin\SettingController::class, 'update']);


        Route::get('Order_Reports', [\App\Http\Controllers\Admin\ReportController::class, 'OrderReports']);
        Route::get('datatable-Order-Reports', [\App\Http\Controllers\Admin\ReportController::class, 'datatableOrderReports'])->name('datatableOrderReports');

        Route::get('Product_Reports', [\App\Http\Controllers\Admin\ProductController::class, 'report']);
        Route::get('datatable-Product_Reports', [\App\Http\Controllers\Admin\ProductController::class, 'datatableProduct_Reports'])->name('datatableProduct_Reports');

        /* Branches Routes Start*/
        Route::get('branches_Setting', [\App\Http\Controllers\Admin\BranchesConroller::class, 'index']);
        Route::get('branches_datatable', [\App\Http\Controllers\Admin\BranchesConroller::class, 'datatable'])->name('branches.datatable.data');
        Route::get('delete-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'destroy']);
        Route::post('store-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'store']);
        Route::get('branches-edit/{id}', [\App\Http\Controllers\Admin\BranchesConroller::class, 'edit']);
        Route::post('update-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'update']);
        Route::get('/add-button-branches', function () {
            return view('admin/branches/button');
        });
        /* Branches Routes End*/

        /* Units Routes Start*/
        Route::get('units_Setting', [\App\Http\Controllers\Admin\UnitsController::class, 'index']);
        Route::get('units_datatable', [\App\Http\Controllers\Admin\UnitsController::class, 'datatable'])->name('units.datatable.data');
        Route::get('delete-units', [\App\Http\Controllers\Admin\UnitsController::class, 'destroy']);
        Route::post('store-units', [\App\Http\Controllers\Admin\UnitsController::class, 'store']);
        Route::get('units-edit/{id}', [\App\Http\Controllers\Admin\UnitsController::class, 'edit']);
        Route::post('update-units', [\App\Http\Controllers\Admin\UnitsController::class, 'update']);
        Route::get('/add-button-units', function () {
            return view('admin/units/button');
        });
        /* Units Routes End*/

        /* CLients Routes Start*/
        Route::get('clients_Setting', [\App\Http\Controllers\Admin\ClientsController::class, 'index']);
        Route::get('clients_datatable', [\App\Http\Controllers\Admin\ClientsController::class, 'datatable'])->name('clients.datatable.data');
        Route::get('delete-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'destroy']);
        Route::post('store-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'store']);
        Route::get('clients-edit/{id}', [\App\Http\Controllers\Admin\ClientsController::class, 'edit']);
        Route::post('update-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'update']);
        Route::get('/add-button-clients', function () {
            return view('admin/clients/button');
        });
        /* Clients Routes End*/

        /* Suppliers Routes Start*/
        Route::get('suppliers_Setting', [\App\Http\Controllers\Admin\SuppliersController::class, 'index']);
        Route::get('suppliers_datatable', [\App\Http\Controllers\Admin\SuppliersController::class, 'datatable'])->name('suppliers.datatable.data');
        Route::get('delete-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'destroy']);
        Route::post('store-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'store']);
        Route::get('suppliers-edit/{id}', [\App\Http\Controllers\Admin\SuppliersController::class, 'edit']);
        Route::post('update-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'update']);
        Route::get('/add-button-suppliers', function () {
            return view('admin/suppliers/button');
        });
        /* Suppliers Routes End*/

        /* Receipts Routes Start*/
        Route::get('receipts_Setting', [\App\Http\Controllers\Admin\ReceiptsController::class, 'index']);
        Route::get('receipts_print/{id?}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'print_receipt']);
        Route::get('receipts_datatable', [\App\Http\Controllers\Admin\ReceiptsController::class, 'datatable'])->name('receipts.datatable.data');
        Route::get('delete-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'destroy']);
        Route::post('store-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'store']);
        Route::get('receipts-edit/{id}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'edit']);
        Route::get('receipts-details/{id}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'details']);
        Route::post('update-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'update']);
        Route::get('/add-button-receipts', function () {
            return view('admin/receipts/button');
        });
        Route::get('project-details',function (){
            return view('admin.project_details');
        });

        /* Receipts Routes End*/

        /* Invoices Routes Start*/
        Route::get('invoices_Setting/{type?}', [\App\Http\Controllers\Admin\InvoicesController::class, 'index']);

        Route::get('invoices_datatable', [\App\Http\Controllers\Admin\InvoicesController::class, 'datatable'])->name('invoices.datatable.data');
        Route::get('delete-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'destroy']);
        Route::post('store-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'store']);
        Route::get('invoices-edit/{id}', [\App\Http\Controllers\Admin\InvoicesController::class, 'edit']);
        Route::get('invoices-details/{id}', [\App\Http\Controllers\Admin\InvoicesController::class, 'details']);
        Route::post('update-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'update']);
        Route::get('/add-button-invoices/{type?}', function ($type = null) {
            return view('admin/invoices/button',compact('type'));
        });
        Route::get('/add-button-invoices-add/{type?}', function ($type = null) {
            return view('admin/invoices/invoice-add1',compact('type'));
        });
        Route::get('/add-button-invoices-item/{type?}', function ($type = null) {
            return view('admin/invoices/invoice-add2',compact('type'));
        });

        Route::get('addInvoiceDetailRow', [\App\Http\Controllers\Admin\InvoicesController::class, 'addInvoiceDetailRow']);
        Route::get('addInvoiceDetailRow1', [\App\Http\Controllers\Admin\InvoicesController::class, 'addInvoiceDetailRow1']);

        /* Invoices Routes End*/
    });

    Route::get('lang/{lang}', function ($lang) {

        if (session()->has('lang')) {
            session()->forget('lang');
        }
        if ($lang == 'en') {
            session()->put('lang', 'en');
        } else {
            session()->put('lang', 'ar');
        }


        return back();
    });

    Route::post('contactForm', [\App\Http\Controllers\frontController::class, 'contactForm']);
    Route::get('ShapeView', [\App\Http\Controllers\frontController::class, 'ShapeView']);
});
