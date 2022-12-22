<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you permission register web routes for your application. These
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
        Route::get('Admin_setting', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->middleware('permission:view Admin,admin');
        Route::get('Admin_datatable', [\App\Http\Controllers\Admin\AdminController::class, 'datatable'])->name('Admin.datatable.data')->middleware('permission:view Admin,admin');
        Route::get('delete-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->middleware('permission:delete Admin,admin');
        Route::post('store-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->middleware('permission:add Admin,admin');
        Route::get('Admin-edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->middleware('permission:edit Admin,admin');
        Route::post('update-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->middleware('permission:edit Admin,admin');
        Route::get('/add-button-Admin', function () {
            return view('admin/Admin/button');
        });

        //employee settings

        Route::get('User_setting', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->middleware('permission:view User,admin');
        Route::get('User_datatable', [\App\Http\Controllers\Admin\UsersController::class, 'datatable'])->name('User.datatable.data')->middleware('permission:view User,admin');
        Route::get('delete-User', [\App\Http\Controllers\Admin\UsersController::class, 'destroy'])->middleware('permission:delete User,admin');
        Route::post('store-User', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->middleware('permission:add User,admin');
        Route::get('User-edit/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'edit'])->middleware('permission:edit User,admin');
        Route::post('update-User', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->middleware('permission:edit User,admin');
        Route::get('/add-button-user', function () {
            return view('admin/User/button');
        });


        Route::get('Categories_Setting', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->middleware('permission:view Categories,admin');
        Route::get('Categories_datatable', [\App\Http\Controllers\Admin\CategoriesController::class, 'datatable'])->name('Categories.datatable.data')->middleware('permission:view Categories,admin');
        Route::get('delete-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'destroy'])->middleware('permission:delete Categories,admin');
        Route::post('store-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'store'])->middleware('permission:add Categories,admin');
        Route::get('Categories-edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->middleware('permission:edit Categories,admin');
        Route::post('update-Categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'update'])->middleware('permission:edit Categories,admin');
        Route::get('/add-button-Categories', function () {
            return view('admin/Categories/button');
        });

        Route::get('Page_Setting', [\App\Http\Controllers\Admin\PageController::class, 'index'])->middleware('permission:view Page,admin');
        Route::get('Page_datatable', [\App\Http\Controllers\Admin\PageController::class, 'datatable'])->name('Page.datatable.data')->middleware('permission:view Page,admin');
        Route::get('delete-Page', [\App\Http\Controllers\Admin\PageController::class, 'destroy'])->middleware('permission:delete Page,admin');
        Route::post('store-Page', [\App\Http\Controllers\Admin\PageController::class, 'store'])->middleware('permission:add Page,admin');
        Route::get('Page-edit/{id}', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->middleware('permission:edit Page,admin');
        Route::post('update-Page', [\App\Http\Controllers\Admin\PageController::class, 'update'])->middleware('permission:edit Page,admin');
        Route::get('/add-button-Page', function () {
            return view('admin/Page/button');
        });


        Route::get('Slider_Setting', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->middleware('permission:view Slider,admin');
        Route::get('Slider_datatable', [\App\Http\Controllers\Admin\SliderController::class, 'datatable'])->name('Slider.datatable.data')->middleware('permission:view Slider,admin');
        Route::get('delete-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'destroy'])->middleware('permission:delete Slider,admin');
        Route::post('store-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'store'])->middleware('permission:add Slider,admin');
        Route::get('Slider-edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit'])->middleware('permission:edit Slider,admin');
        Route::post('update-Slider', [\App\Http\Controllers\Admin\SliderController::class, 'update'])->middleware('permission:edit Slider,admin');
        Route::get('/add-button-Slider', function () {
            return view('admin/Slider/button');
        });

        Route::get('Product_Setting', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->middleware('permission:view Product,admin');
        Route::get('Product_datatable', [\App\Http\Controllers\Admin\ProductController::class, 'datatable'])->name('Product.datatable.data')->middleware('permission:view Product,admin');
        Route::get('delete-Product', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->middleware('permission:delete Product,admin');
        Route::post('store-Product', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->middleware('permission:add Product,admin');
        Route::get('Product-edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->middleware('permission:edit Product,admin');
        Route::post('update-Product', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->middleware('permission:edit Product,admin');
        Route::get('/add-button-Product', function () {
            return view('admin/Product/button');
        });

        Route::get('get-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'getProducts']);

        Route::get('ProductImages/{id}', [\App\Http\Controllers\Admin\ProductImagesController::class, 'index'])->middleware('permission:view Product,admin');
        Route::get('ProductImages_datatable', [\App\Http\Controllers\Admin\ProductImagesController::class, 'datatable'])->name('ProductImages.datatable.data')->middleware('permission:view Product,admin');
        Route::get('delete-ProductImages', [\App\Http\Controllers\Admin\ProductImagesController::class, 'destroy'])->middleware('permission:delete Product,admin');
        Route::post('store-ProductImages', [\App\Http\Controllers\Admin\ProductImagesController::class, 'store'])->middleware('permission:add Product,admin');
        Route::get('/add-button-ProductImages/{id}', function ($id) {
            return view('admin/ProductImages/button', compact('id'));
        });


        Route::get('Storage_Setting/{id?}', [\App\Http\Controllers\Admin\StorageController::class, 'index'])->middleware('permission:view Storage,admin');
        Route::get('Storage_datatable', [\App\Http\Controllers\Admin\StorageController::class, 'datatable'])->name('Storage.datatable.data')->middleware('permission:view Storage,admin');
        Route::get('delete-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'destroy'])->middleware('permission:delete Storage,admin');
        Route::post('store-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'store'])->middleware('permission:add Storage,admin');
        Route::post('Transfer-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'TransferStorage'])->middleware('permission:add Storage,admin');
        Route::get('Storage-edit/{id}', [\App\Http\Controllers\Admin\StorageController::class, 'edit'])->middleware('permission:view Permissions,admin');
        Route::post('update-Storage', [\App\Http\Controllers\Admin\StorageController::class, 'update'])->middleware('permission:view Permissions,admin');
        Route::get('/add-button-Storage/{id?}', function ($id = null) {
            return view('admin/Storage/button', compact('id'));
        });
        Route::get('get-Avaliablbe-Storage/{id?}', [\App\Http\Controllers\Admin\StorageController::class, 'getAvaliablbeStorage'])->middleware('permission:view Storage,admin');
        Route::get('get-Shape-Storage/{id}/{product}', [\App\Http\Controllers\Admin\StorageController::class, 'getShapeStorage'])->middleware('permission:view Storage,admin');


        Route::get('StorageTransaction_Setting', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'index'])->middleware('permission:view StorageTransaction,admin');
        Route::get('StorageTransaction_datatable', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'datatable'])->name('StorageTransaction.datatable.data')->middleware('permission:view StorageTransaction,admin');
        Route::get('delete-StorageTransaction', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'destroy'])->middleware('permission:delete StorageTransaction,admin');
        // Route::post('store-StorageTransaction', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'store'])->middleware('permission:view Permissions');
        // Route::get('StorageTransaction-edit/{id}', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'edit'])->middleware('permission:view Permissions');
        // Route::post('update-StorageTransaction', [\App\Http\Controllers\Admin\StorageTransactionController::class, 'update'])->middleware('permission:view Permissions');
         Route::get('/add-button-StorageTransaction/{id?}', function ($id = null) {
            return view('admin/StorageTransaction/button', compact('id'));
        });


        Route::get('get-Shapes/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'getShapes']);

        Route::get('Shapes/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'index'])->middleware('permission:view Shapes,admin');
        Route::get('Shapes_datatable', [\App\Http\Controllers\Admin\ShapeController::class, 'datatable'])->name('Shapes.datatable.data')->middleware('permission:view Shapes,admin');
        Route::get('delete-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'destroy'])->middleware('permission:delete Shapes,admin');
        Route::post('store-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'store'])->middleware('permission:add Shapes,admin');
        Route::get('Shapes-edit/{id}', [\App\Http\Controllers\Admin\ShapeController::class, 'edit'])->middleware('permission:edit Shapes,admin');
        Route::post('update-Shapes', [\App\Http\Controllers\Admin\ShapeController::class, 'update'])->middleware('permission:edit Shapes,admin');
        Route::get('/add-button-Shapes/{id}', function ($id) {
            return view('admin/Shapes/button', compact('id'));
        });


        Route::get('Coupons_Setting', [\App\Http\Controllers\Admin\CouponController::class, 'index'])->middleware('permission:view Coupons,admin');
        Route::get('Coupons_datatable', [\App\Http\Controllers\Admin\CouponController::class, 'datatable'])->name('Coupons.datatable.data')->middleware('permission:view Coupons,admin');
        Route::get('delete-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'destroy'])->middleware('permission:delete Coupons,admin');
        Route::post('store-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'store'])->middleware('permission:add Coupons,admin');
        Route::get('Coupons-edit/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'edit'])->middleware('permission:edit Coupons,admin');
        Route::post('update-Coupons', [\App\Http\Controllers\Admin\CouponController::class, 'update'])->middleware('permission:edit Coupons,admin');
        Route::get('/add-button-Coupons', function () {
            return view('admin/Coupons/button');
        });


        Route::get('Orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->middleware('permission:view Orders,admin');
        Route::get('Restaurants-Orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'Restaurants_Orders'])->middleware('permission:view Orders,admin');
        Route::get('User-Orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'User_Orders'])->middleware('permission:view Orders,admin');

        Route::get('Order_detail/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'Order_detail'])->middleware('permission:detail Orders,admin');
        Route::get('Order_datatable', [\App\Http\Controllers\Admin\OrderController::class, 'datatable'])->name('Order.datatable.data')->middleware('permission:view Orders,admin');
        Route::get('delete-Order', [\App\Http\Controllers\Admin\OrderController::class, 'destroy'])->middleware('permission:delete Orders,admin');
        Route::get('/add-button-Order', function () {
            return view('admin/Order/button');
        });
        Route::post('update-Order-states', [\App\Http\Controllers\Admin\OrderController::class, 'updateOrderStates'])->middleware('permission:update Orders,admin');

        Route::get('PointOfSale', [\App\Http\Controllers\Admin\PosController::class, 'index'])->middleware('permission:view Pos,admin');
        Route::get('POSProducts', [\App\Http\Controllers\Admin\PosController::class, 'POSProducts'])->middleware('permission:view Pos,admin');
        Route::get('getShapesPos', [\App\Http\Controllers\Admin\PosController::class, 'getShapesPos'])->middleware('permission:view Pos,admin');
        Route::get('add-item', [\App\Http\Controllers\Admin\PosController::class, 'addItem'])->middleware('permission:view Pos,admin');
        Route::get('delete-item', [\App\Http\Controllers\Admin\PosController::class, 'deleteItem'])->middleware('permission:view Pos,admin');
        Route::get('update-count', [\App\Http\Controllers\Admin\PosController::class, 'updateDelete'])->middleware('permission:view Pos,admin');
        Route::get('getDataPos', [\App\Http\Controllers\Admin\PosController::class, 'getDataPos'])->middleware('permission:view Pos,admin');
        Route::get('PosDetails/{id}', [\App\Http\Controllers\Admin\PosController::class, 'details'])->middleware('permission:view Pos,admin');
        Route::post('StoreInvoice', [\App\Http\Controllers\Admin\PosController::class, 'StoreInvoice'])->middleware('permission:view Pos,admin');


        Route::get('General_Setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->middleware('permission:view General_Setting,admin');
        Route::post('edit_setting', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->middleware('permission:update General_Setting,admin');


        Route::get('Order_Reports', [\App\Http\Controllers\Admin\ReportController::class, 'OrderReports'])->middleware('permission:view Order_Reports,admin');
        Route::get('datatable-Order-Reports', [\App\Http\Controllers\Admin\ReportController::class, 'datatableOrderReports'])->name('datatableOrderReports')->middleware('permission:view Order_Reports,admin');

        Route::get('Product_Reports', [\App\Http\Controllers\Admin\ProductController::class, 'report'])->middleware('permission:view Product_Reports,admin');
        Route::get('datatable-Product_Reports', [\App\Http\Controllers\Admin\ProductController::class, 'datatableProduct_Reports'])->name('datatableProduct_Reports')->middleware('permission:view Product_Reports,admin');

        /* Branches Routes Start*/
        Route::get('branches_Setting', [\App\Http\Controllers\Admin\BranchesConroller::class, 'index'])->middleware('permission:view branches,admin');
        Route::get('branches_datatable', [\App\Http\Controllers\Admin\BranchesConroller::class, 'datatable'])->name('branches.datatable.data')->middleware('permission:view branches,admin');
        Route::get('delete-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'destroy'])->middleware('permission:delete branches,admin');
        Route::post('store-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'store'])->middleware('permission:add branches,admin');
        Route::get('branches-edit/{id}', [\App\Http\Controllers\Admin\BranchesConroller::class, 'edit'])->middleware('permission:edit branches,admin');
        Route::post('update-branches', [\App\Http\Controllers\Admin\BranchesConroller::class, 'update'])->middleware('permission:edit branches,admin');
        Route::get('/add-button-branches', function () {
            return view('admin/branches/button');
        });
        /* Branches Routes End*/

        /* Units Routes Start*/
        Route::get('units_Setting', [\App\Http\Controllers\Admin\UnitsController::class, 'index'])->middleware('permission:view units,admin');
        Route::get('units_datatable', [\App\Http\Controllers\Admin\UnitsController::class, 'datatable'])->name('units.datatable.data')->middleware('permission:view units,admin');
        Route::get('delete-units', [\App\Http\Controllers\Admin\UnitsController::class, 'destroy'])->middleware('permission:delete units,admin');
        Route::post('store-units', [\App\Http\Controllers\Admin\UnitsController::class, 'store'])->middleware('permission:add units,admin');
        Route::get('units-edit/{id}', [\App\Http\Controllers\Admin\UnitsController::class, 'edit'])->middleware('permission:edit units,admin');
        Route::post('update-units', [\App\Http\Controllers\Admin\UnitsController::class, 'update'])->middleware('permission:edit units,admin');
        Route::get('/add-button-units', function () {
            return view('admin/units/button');
        });
        /* Units Routes End*/

        /* CLients Routes Start*/
        Route::get('clients_Setting', [\App\Http\Controllers\Admin\ClientsController::class, 'index'])->middleware('permission:view clients,admin');
        Route::get('clients_datatable', [\App\Http\Controllers\Admin\ClientsController::class, 'datatable'])->name('clients.datatable.data')->middleware('permission:view clients,admin');
        Route::get('delete-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->middleware('permission:delete clients,admin');
        Route::post('store-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'store'])->middleware('permission:add clients,admin');
        Route::get('clients-edit/{id}', [\App\Http\Controllers\Admin\ClientsController::class, 'edit'])->middleware('permission:edit clients,admin');
        Route::post('update-clients', [\App\Http\Controllers\Admin\ClientsController::class, 'update'])->middleware('permission:edit clients,admin');
        Route::get('/add-button-clients', function () {
            return view('admin/clients/button');
        });
        /* Clients Routes End*/

        /* Suppliers Routes Start*/
        Route::get('suppliers_Setting', [\App\Http\Controllers\Admin\SuppliersController::class, 'index'])->middleware('permission:view suppliers,admin');
        Route::get('suppliers_datatable', [\App\Http\Controllers\Admin\SuppliersController::class, 'datatable'])->name('suppliers.datatable.data')->middleware('permission:view suppliers,admin');
        Route::get('delete-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'destroy'])->middleware('permission:delete suppliers,admin');
        Route::post('store-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'store'])->middleware('permission:add suppliers,admin');
        Route::get('suppliers-edit/{id}', [\App\Http\Controllers\Admin\SuppliersController::class, 'edit'])->middleware('permission:edit suppliers,admin');
        Route::post('update-suppliers', [\App\Http\Controllers\Admin\SuppliersController::class, 'update'])->middleware('permission:edit suppliers,admin');
        Route::get('/add-button-suppliers', function () {
            return view('admin/Suppliers/button');
        });
        /* Suppliers Routes End*/

        /* Receipts Routes Start*/
        Route::get('receipts_Setting', [\App\Http\Controllers\Admin\ReceiptsController::class, 'index'])->middleware('permission:view receipts,admin');
        Route::get('receipts_print/{id?}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'print_receipt'])->middleware('permission:view receipts,admin');
        Route::get('receipts_datatable', [\App\Http\Controllers\Admin\ReceiptsController::class, 'datatable'])->name('receipts.datatable.data')->middleware('permission:view receipts,admin');
        Route::get('delete-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'destroy'])->middleware('permission:delete receipts,admin');
        Route::post('store-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'store'])->middleware('permission:add receipts,admin');
        Route::get('receipts-edit/{id}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'edit'])->middleware('permission:edit receipts,admin');
        Route::get('receipts-details/{id}', [\App\Http\Controllers\Admin\ReceiptsController::class, 'details'])->middleware('permission:view receipts,admin');
        Route::post('update-receipts', [\App\Http\Controllers\Admin\ReceiptsController::class, 'update'])->middleware('permission: receipts,admin');
        Route::get('/add-button-receipts', function () {
            return view('admin/receipts/button');
        });
        Route::get('project-details',function (){
            return view('admin.project_details');
        });

        /* Receipts Routes End*/

        /* Invoices Routes Start*/
        Route::get('invoices_Setting/{type?}', [\App\Http\Controllers\Admin\InvoicesController::class, 'index'])->middleware('permission:view invoices,admin');

        Route::get('invoices_datatable', [\App\Http\Controllers\Admin\InvoicesController::class, 'datatable'])->name('invoices.datatable.data')->middleware('permission:view invoices,admin');
        Route::get('delete-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'destroy'])->middleware('permission:delete invoices,admin');
        Route::post('store-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'store'])->middleware('permission:add invoices,admin');
        Route::get('invoices-edit/{id}', [\App\Http\Controllers\Admin\InvoicesController::class, 'edit'])->middleware('permission:edit invoices,admin');
        Route::get('invoices-details/{id}', [\App\Http\Controllers\Admin\InvoicesController::class, 'details'])->middleware('permission:view invoices,admin');
        Route::post('update-invoices', [\App\Http\Controllers\Admin\InvoicesController::class, 'update'])->middleware('permission:edit invoices,admin');
        Route::get('/add-button-invoices/{type?}', function ($type = null) {
            return view('admin/invoices/button',compact('type'));
        });
        Route::get('/add-button-invoices-add/{type?}', function ($type = null) {
            return view('admin/invoices/invoice-add1',compact('type'));
        });
        Route::get('/add-button-invoices-item/{type?}', function ($type = null) {
            return view('admin/invoices/invoice-add2',compact('type'));
        });
        Route::get('/invoice-index/{id}', function ($type = null) {
            return view('admin/invoices/index-invoice',compact('type'));
        });
        Route::get('addInvoiceDetailRow', [\App\Http\Controllers\Admin\InvoicesController::class, 'addInvoiceDetailRow'])->middleware('permission:add invoices,admin');
        Route::get('addInvoiceDetailRow1', [\App\Http\Controllers\Admin\InvoicesController::class, 'addInvoiceDetailRow1'])->middleware('permission:add invoices,admin');

    //permission
    Route::get('/Permissions', [\App\Http\Controllers\Admin\PermissionsController::class, 'index'])->middleware('permission:view Permissions,admin');
    Route::get('/Permission-database', [\App\Http\Controllers\Admin\PermissionsController::class, 'datatable'])->name('Permission.database.data')->middleware('permission:view Permissions,admin');;
    Route::post('/create-Permission', [\App\Http\Controllers\Admin\PermissionsController::class, 'store'])->middleware('permission:add Permissions,admin');;
    Route::get('/create-Permission', [\App\Http\Controllers\Admin\PermissionsController::class, 'create'])->middleware('permission:add Permissions,admin');;
    Route::get('/edit-Permission/{id}', [\App\Http\Controllers\Admin\PermissionsController::class, 'edit'])->middleware('permission:edit Permissions,admin');;
    Route::post('/update-Permission', [\App\Http\Controllers\Admin\PermissionsController::class, 'update'])->middleware('permission:edit Permissions,admin');;
    Route::get('/delete-Permission', [\App\Http\Controllers\Admin\PermissionsController::class, 'delete'])->middleware('permission:delete Permissions,admin');;
        Route::get('/add-button-Permission', function () {
            return view('admin/Permission/button');
        });
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
