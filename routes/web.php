<?php
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\admin\AdminController;
// use App\Http\Controllers\admin\sectionController;
// use App\Http\Controllers\admin\categoryController;
// use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
// use App\Models\Admin;
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


Route::get('/welcome', function () {
    return view('welcome');

})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
// Route::get('admin/dashboard',[adminController::class,'dashboard']);
Route::get('/',[AdminController::class,'dashboard']);

   Route::prefix('/admin')->namespace('App\Http\Controllers\admin')->group(function(){
  
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        
       
        Route::get('/dashboard',[AdminController::class,'dashboard']);
        // update admin password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword') ;
        Route::post( 'check-admin-password', 'AdminController@checkAdminPassword') ;
//  update admin details
   
Route::match(['get', 'post'], 'update-admin-detail','AdminController@updateAdminDetail');
Route::match(['get', 'post'], 'update-vendor-details/{slug}','AdminController@updateVendorDetail');
            

Route::get('/admins/{type?}','AdminController@Admins');
Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');
Route::post('/apdate-admin-status', 'AdminController@apdateAdminStatus');

Route::get('/test','AdminController@Test');

        
        // admin logout
        Route::get('/logout' , 'AdminController@logout');
    //    Sections
        Route::get('sections' , 'sectionController@Sections');
        Route::post('update-section-status' , 'sectionController@updateSectionStatus');
        Route::get('delete-section/{id}' , 'sectionController@deleteSection');
        Route::match(['get', 'post'], 'add-edit-section/{id?}','sectionController@addUpdateSection');

        // Category
        Route::get('/categories' , 'categoryController@categories');
        Route::post('update-category-status' , 'categoryController@updateCategoryStatus');
        Route::get('delete-category/{id}' , 'categoryController@deleteCategory');
        Route::match(['get', 'post'], 'add-edit-category/{id?}','categoryController@addUpdatecategory');
        Route::get('append-categories-level' , 'categoryController@appendCategoryLevel');
        
    });
    
    
});

// Route::get('/admin/login',[adminController::class,'login']);
// Route::get('/admin/login',[adminController::class,'login'])->name('adminLoginPage');


// dashboard route without group route

