<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\NewPdfController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\PPTController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\VariantAttributeController;
use App\Http\Controllers\Admin\PaymentInvoiceController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\CatalogueController as AdminCatalogueController;
use App\Http\Controllers\Front\FrontCatalogueController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.logins');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
  
});


Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->controller(HomeController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        Route::post('/filterdashbored', 'filterdashbored')->name('admin.filterdashbored');
        //customer controller
        Route::prefix('customer')->controller(CustomerController::class)->group(function (){
            Route::get('/', 'index')->name('admin.customer');
            Route::post('/store','store')->name('admin.customer.store');
            Route::post('/update/{id}','update')->name('customer.update');
            Route::post('/edit/{id}','edit')->name('customer.edit');
            Route::post('/delete/{id}','destroy')->name('customer.delete');
            Route::post('/deletecheck','deletecheck')->name('customer.deletecheck');
        });

        //product controller 
        Route::prefix('product')->controller(ProductController::class)->group(function() {
            Route::get('/', 'index')->name('product.index');
            Route::get('/create', 'create')->name('product.create');
            Route::post('/store', 'store')->name('product.store');
            Route::get('/edit/{id}', 'edit')->name('product.edit');
            Route::post('/update/{id}', 'update')->name('product.update');
            Route::get('/delete/{id}', 'destroy')->name('product.delete');
        });

        //category controller 
        Route::prefix('category')->controller(CategoryController::class)->group(function() {
            route::get('/index', 'index')->name('category.index');
            route::post('/store', 'store')->name('category.store');
            Route::get('edit/{id}', 'edit')->name('category.edit');
            Route::post('update/{id}', 'update')->name('category.update');
            Route::get('delete/{id}', 'destroy')->name('category.delete');
            Route::get('getCategory', 'getCategory')->name('category.getCategory');
        });

        //unit controller 
        Route::prefix('unit')->controller(UnitController::class)->group(function() {
            route::get('/index', 'index')->name('unit.index');
            route::post('/store', 'store')->name('unit.store');
            Route::get('edit/{id}', 'edit')->name('unit.edit');
            Route::post('update/{id}', 'update')->name('unit.update');
            Route::get('delete/{id}', 'destroy')->name('unit.delete');
            Route::get('getUnit', 'getUnit')->name('unit.getUnit');
        });
        //brand controller 
        Route::prefix('brand')->controller(BrandController::class)->group(function() {
            route::get('/index', 'index')->name('brand.index');
            route::post('/store', 'store')->name('brand.store');
            Route::get('edit/{id}', 'edit')->name('brand.edit');
            Route::post('update/{id}', 'update')->name('brand.update');
            Route::get('delete/{id}', 'destroy')->name('brand.delete');
            Route::get('getBrand', 'getBrand')->name('brand.getBrand');
        });
        //group controller 
        Route::prefix('group')->controller(GroupController::class)->group(function() {
            route::get('/index', 'index')->name('group.index');
            route::post('/store', 'store')->name('group.store');
            Route::get('edit/{id}', 'edit')->name('group.edit');
            Route::post('update/{id}', 'update')->name('group.update');
            Route::get('delete/{id}', 'destroy')->name('group.delete');
            Route::get('getGroup', 'getGroup')->name('group.getGroup');
        });
        //color controller 
        Route::prefix('color')->controller(ColorController::class)->group(function() {
            route::get('/index', 'index')->name('color.index');
            route::post('/store', 'store')->name('color.store');
            Route::get('edit/{id}', 'edit')->name('color.edit');
            Route::post('update/{id}', 'update')->name('color.update');
            Route::get('delete/{id}', 'destroy')->name('color.delete');
            Route::get('getColor', 'getColor')->name('color.getColor');
        });
        //size controller 
        Route::prefix('size')->controller(SizeController::class)->group(function() {
            route::get('/index', 'index')->name('size.index');
            route::post('/store', 'store')->name('size.store');
            Route::get('edit/{id}', 'edit')->name('size.edit');
            Route::post('update/{id}', 'update')->name('size.update');
            Route::get('delete/{id}', 'destroy')->name('size.delete');
            Route::get('getSize', 'getSize')->name('size.getSize');
        });

        //Product variant Attribute controller 
        Route::prefix('variantAttr')->controller(VariantAttributeController::class)->group(function() {
            route::get('/index', 'index')->name('variantAttr.index');
            route::post('/store', 'store')->name('variantAttr.store');
            Route::get('edit/{id}', 'edit')->name('variantAttr.edit');
            Route::post('update/{id}', 'update')->name('variantAttr.update');
            Route::get('delete/{id}', 'destroy')->name('variantAttr.delete');
            Route::get('getVariantAttr', 'getVariantAttr')->name('variantAttr.getVariantAttr');
        });


        //Catalogue Controller
        Route::prefix('catalogue')->controller(AdminCatalogueController::class)->group(function() {
            route::get('index', 'index')->name('catalogue.index');  
            route::get('catloglisting/{id}', 'catloglisting')->name('catalogue.catloglisting');  
            route::get('add_buyer', 'add_buyer')->name('catalogue.add_buyer');  
            route::get('buyerdata', 'buyerdata')->name('catalogue.buyerdata');  
            route::get('genratecatalogue', 'genratecatalogue')->name('catalogue.genratecatalogue');  
            route::post('productvariaint', 'productvariaint')->name('catalogue.productvariaint');  
            route::get('sendbuyerlinkready/{maxId}/{securityCode}', 'sendbuyerlinkready')->name('catalogue.sendbuyerlinkready');  
            // route::post('viewcatalogue/{catid}', 'viewcatalogue')->name('catalogue.viewcatalogue');  
            // route::post('emailverification', 'emailverification')->name('catalogue.emailverification');  
            route::get('allproduct/{catid}/{token}/{userid}', 'allproduct')->name('catalogue.allproduct');  
            // Route::get('quotation/{catid}/{token}', 'quotation')->name('catalogue.quotation');
            route::post('pricegraf', 'pricegraf')->name('catalogue.pricegraf');  
            route::post('addamount', 'addamount')->name('catalogue.addamount');  
        
            //email send
            Route::post('emailSend', 'emailSend')->name('catalogue.emailSend');
            
        });

        Route::prefix('payment')->controller(PaymentInvoiceController::class)->group(function() { 
            route::get('index', 'index')->name('payment.index');  
            route::post('create', 'create')->name('payment.create');  
            route::post('activaccount', 'activaccount')->name('payment.activaccount');  
            route::post('edit/{id}', 'edit')->name('payment.edit');  
            route::post('update', 'update')->name('payment.update');  
            route::post('delete/{id}', 'delete')->name('payment.delete');  
        });
        Route::prefix('quotation')->controller(QuotationController::class)->group(function() { 
            route::get('index', 'index')->name('quotation.index');  
            route::get('view/{catalog_id}/{company_id}/{buyer_id}/{userid}', 'view')->name('quotation.view');  
            route::post('send', 'send')->name('quotation.send');  
       
        });
        Route::prefix('invoice')->controller(InvoiceController::class)->group(function() { 
            route::get('index', 'index')->name('invoice.index');  
            // route::get('view/{catalog_id}/{company_id}/{buyer_id}', 'view')->name('quotation.view');  
            // route::post('send', 'send')->name('quotation.send');  
       
        });
    });
 
    Route::post('pdf/pdfGenerate', [PdfController::class, 'generatePdf'])->name('admin.pdfGenerate');
    Route::get('productexporet', [ExcelController::class, 'productexporet'])->name('excel.productexporet');
    Route::get('catalogexporet/{catid}/{token}', [ExcelController::class, 'catalogexporet'])->name('excel.catalogexporet');
    Route::get('categoryexporet/', [ExcelController::class, 'categoryexporet'])->name('excel.categoryexporet');
    Route::get('unitsexporet/', [ExcelController::class, 'unitsexporet'])->name('excel.unitsexporet');
    Route::get('brandexporet/', [ExcelController::class, 'brandexporet'])->name('excel.brandexporet');
    Route::get('groupsexporet/', [ExcelController::class, 'groupsexporet'])->name('excel.groupsexporet');
    Route::get('colorexporet/', [ExcelController::class, 'colorexporet'])->name('excel.colorexporet');
    Route::get('variantexporet/', [ExcelController::class, 'variantexporet'])->name('excel.variantexporet');
    Route::post('exporetdata/', [ExcelController::class, 'exportData'])->name('excel.exporetdata');
    Route::get('exportPpt/{catid}/{token}', [PPTController::class, 'exportPpt'])->name('export.ppt');
  // routes/web.php



});


Route::prefix('user')->group(function() {
    Auth::routes();
    route::get('viewcatalogue/{token}', [FrontCatalogueController::class,'viewcatalogue'])->name('user.viewcatalogue'); 
    route::post('emailverification',[FrontCatalogueController::class,'emailverification'])->name('user.emailverification');  
    route::get('sendinvoice/{token}/{catid}',[FrontCatalogueController::class,'sendinvoice'])->name('user.sendinvoice');  
    route::post('doneinvoice/',[FrontCatalogueController::class,'doneinvoice'])->name('user.doneinvoice');  

});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('user.logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');
    Route::get('showcatalogue/{id}', [FrontCatalogueController::class,'index'])->name('user.catalogue.showcatalogue');
    Route::get('deshbored', [FrontCatalogueController::class,'deshbored'])->name('user.catalogue.deshbored');
    Route::post('editprofile', [FrontCatalogueController::class,'editprofile'])->name('user.catalogue.editprofile');
    Route::post('editpassword', [FrontCatalogueController::class,'editpassword'])->name('user.catalogue.editpassword');
    route::get('allproduct/{securitycode}/{userid}', [FrontCatalogueController::class,'allproduct'])->name('user.allproduct');  
    Route::get('quotation/{pid}/{userid}/{catid}', [FrontCatalogueController::class,'quotation'])->name('user.quotation');
    route::post('pricegraf', [FrontCatalogueController::class,'pricegraf'])->name('user.pricegraf');  
    route::post('addamount', [FrontCatalogueController::class,'addamount'])->name('user.addamount');  
    route::post('quotationsend', [FrontCatalogueController::class,'quotationsend'])->name('user.quotationsend');  

    

});






