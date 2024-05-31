<?php


use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockAdjustmentDetailController;
use App\Http\Controllers\StockAdjustmentTypeController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequisitionDetailController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuth;


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
// Common routes accessible to all roles
Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'custom.auth'], function () {

});

Route::middleware(['web', 'CustomAuth'])->group(function () {
  // Your routes here...
  Route::resource('users', UserController::class);
  Route::get("getuser",[UserController::class,'get_user_json']);

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::resource('roles', RoleController::class);
  Route::resource('departments', DepartmentController::class);
  Route::resource('activity-log', ActivityLogController::class);
  Route::resource('permissions', PermissionController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('status', StatusController::class);
  Route::resource('uoms', UomController::class);
  Route::resource('transaction-types',TransactionTypeController::class);
  Route::resource('stocks', StockController::class);
  Route::resource('projects', ProjectController::class);
  Route::resource('tasks', TaskController::class);
  Route::get('/users/{id}', 'UserController@show')->name('users.show');

  Route::resource('stockadjustments', StockAdjustmentController::class);
  Route::resource('stockadjustmenttypes', StockAdjustmentTypeController::class);
  Route::resource('stockadjustmentdetails', StockAdjustmentDetailController::class);
  Route::resource('/requisitions', RequisitionController::class);
  Route::resource('/requisitiondetails',RequisitionDetailController::class);
  Route::resource('/purchases', PurchaseController::class);
  Route::resource('/purchasedetails', PurchaseDetailController::class);
  Route::resource('suppliers', SupplierController::class);
  Route::get("getsupplier",[SupplierController::class,'get_supplier_json']);
  Route::get('/new-requisitions-count', [RequisitionController::class, 'getNewRequisitionsCount']);
  Route::get('/new-requisitions', [RequisitionController::class, 'getNewRequisitions']);
  Route::get('/report/requisition',[ReportController::class,'reportRequisition']);
  Route::get('/report/purchase',[ReportController::class,'reportPurchase']);

  Route::resource('products', ProductController::class);
  Route::get("getproduct",[ProductController::class,'get_product_json']);
  Route::match(['get', 'put'], '/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
  // routes/web.php

// Route::get('/activity-log/{userId}', 'ActivityLogController@userActivityLog')->name('user.activity-log');

  // Your protected routes here
});





// Show the password reset request form
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Handle the password reset request form submission
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Show the password reset form with token and email parameters
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Handle the password reset form submission
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
