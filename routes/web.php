<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sidebar', function () {
    return view(view:'sidebar');
})->middleware(['auth'])->name(name:'sidebar');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/logout',[CustomAuthController::class,'logoutUser'])->name('logout');
Route::get('/login',[CustomAuthController::class,'login'])->name('login');

Route::group(['middleware' => ['custom']],function ()
{

 Route::get('/dashboard',[CustomAuthController::class,'dashboardUser'])->name('dashboard');

Route::post('/employees/store',[EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/show/{id}',[EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/index',[EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/edit',[EmployeeController::class, 'update'])->name('employees.update');
Route::get('/employees/edit/{id}',[EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('nonadmin/employees/index',[EmployeeController::class, 'index'])->name('nonadmin/employees/index');

Route::get('/users/index',[UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
});






  






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
