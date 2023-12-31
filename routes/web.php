<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/session', function () {

    $session = session()->all();

    echo "<pre>";
    print_r($session);
    echo "</pre>";

});

Route::get('/', function () {
    return to_route('admin.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('admin.index');

        // Profile

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Roles

        Route::get('/role', [RoleController::class, 'role'])->name('admin.role');

        Route::get('/role/create', [RoleController::class, 'roleCreatePage'])->name('admin.role.createPage');

        Route::post('/role/create', [RoleController::class, 'create'])->name('admin.role.create');

        Route::get('/role/edit/{id}', [RoleController::class, 'roleEditPage'])->name('admin.role.edit');

        Route::put('/role/update/{id}', [RoleController::class, 'roleUpdate'])->name('admin.role.update');

        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('admin.role.permissions');

        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('admin.role.permissions.revoke');



        // Permissions

        Route::get('/permission', [PermissionController::class, 'permission'])->name('admin.permission');

        Route::get('/permission/create', [PermissionController::class, 'permissionCreatePage'])->name('admin.permission.createPage');

        Route::post('/permission/create', [PermissionController::class, 'permissionCreate'])->name('admin.permission.create');

        Route::get('/permission/edit/{id}', [PermissionController::class, 'permissionEditPage'])->name('admin.permission.edit');

        Route::put('/permission/update/{id}', [PermissionController::class, 'permissionUpdate'])->name('admin.permission.update');

        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'givePermission'])->name('admin.permissions.role');

        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('admin.permissions.roles.revoke');


        // Users

        Route::get('/users', [UserController::class, 'user'])->name('admin.user');

        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('admin.users.roles');

        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('admin.users.roles.remove');

        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('admin.users.permissions');

        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('admin.users.permissions.revoke');

        Route::get('/check-permissions', [PermissionController::class, 'checkPer']);


        Route::get('/discount', [DiscountController::class, 'index'])->name('admin.discount.index');

        Route::get('/discount/sell_ticket', [DiscountController::class, 'sell_ticket'])->name('admin.discount.sell_ticket');

        Route::get('/discount/sell_ticket/get_name/{mobile}', [DiscountController::class, 'get_name'])->name('get_name');

        Route::post('/discount/sell_ticket', [DiscountController::class, 'sell_ticketSave'])->name('admin.discount.sell_ticketSave');

        Route::get('/discount/condition', [DiscountController::class, 'discount_condition'])->name('admin.discount.condition');

        Route::post('/discount/condition', [DiscountController::class, 'discount_conditionSave'])->name('admin.discount.conditionSave');

        Route::get('/discount/condition_edit/{id}', [DiscountController::class, 'condition_edit'])->name('admin.discount.condition_edit');



        Route::get('/income', [IncomeController::class, 'index'])->name('admin.income.index');

        Route::post('/income', [IncomeController::class, 'dataSave'])->name('admin.income.dataSave');



        Route::get('/income_from', [IncomeController::class, 'income_from'])->name('admin.income.income_from');

        Route::post('/income_from', [IncomeController::class, 'income_fromSave'])->name('admin.income.income_fromSave');


        Route::get('/expense', [ExpenseController::class, 'index'])->name('admin.expense.index');

        Route::get('/expense_add', [ExpenseController::class, 'expense_add'])->name('admin.expense.expense_add');

        Route::post('/expense_add', [ExpenseController::class, 'expense_addSave'])->name('admin.expense.expense_addSave');

        Route::get('/expense/category', [ExpenseController::class, 'expense_category'])->name('admin.expense.category');

        Route::post('/expense/category', [ExpenseController::class, 'expense_categorySave'])->name('admin.expense.categorySave');



    });

});












require __DIR__ . '/auth.php';