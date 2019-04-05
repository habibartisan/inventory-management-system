<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Employee Route Are Here------------------------
Route::get('/add.employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert.employee', 'EmployeeController@store')->name('insert.employee');
Route::get('/all.employee', 'EmployeeController@Employee')->name('all.employee');
Route::get('/view-employee/{id}', 'EmployeeController@viewEmployee')->name('view-employee');
Route::get('/delete-employee/{id}', 'EmployeeController@deleteemployee')->name('delete-employee');
Route::get('/edit-employee/{id}', 'EmployeeController@editemployee')->name('edit-employee');
Route::post('/update.employee/{id}', 'EmployeeController@updateemployee')->name('update.employee');

//Customers Route Are Here-----------------------
Route::get('/add.customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert.customer', 'CustomerController@store')->name('insert.customer');
Route::get('/all.customer', 'CustomerController@customer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@viewcustomer')->name('view-customer');
Route::get('/delete-customer/{id}', 'CustomerController@deletecustomer')->name('delete-customer');
Route::get('/edit-customer/{id}', 'CustomerController@editcustomer')->name('edit-customer');
Route::post('/update.customer/{id}', 'CustomerController@updatecustomer')->name('update.customer');

//suppliers routes are here----------------
Route::get('/add.supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert.supplier', 'SupplierController@store')->name('insert.supplier');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all-supplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier')->name('view-supplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier')->name('delete-supplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier')->name('edit-supplier');
Route::post('/update.supplier/{id}','SupplierController@UpdateSupplier')->name('update.supplier');

//salary routes start from here
Route::get('/addv-advenced-salary', 'SalaryController@AddAdvancedSalary')->name('addv.advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@InsertAdvanced')->name('add.advancedsalary');
Route::get('/all-advenced-salary', 'SalaryController@AllSalary')->name('all.advancedsalary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');

//category rputes here------------
Route::get('/add-category','SalaryController@AddCategory')->name('add.category');
Route::post('/insertcategory','SalaryController@InsertCategory')->name('insertcategory');
Route::get('/all-catgory', 'SalaryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'SalaryController@DeleteCategory')->name('delete-category');
Route::get('/edit-category/{id}', 'SalaryController@EditCategory')->name('edit-category');
Route::post('/update-category/{id}','SalaryController@UpdateCategory')->name('update-category');


//Product Routes are here------------------
Route::get('/add-product','ProductController@AddProduct')->name('add.product');
Route::post('/insert-product','ProductController@InsertProduct')->name('insert.product');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct')->name('delete-product');
Route::get('/view-product/{id}', 'ProductController@ViewProduct')->name('view-product');
Route::get('/edit-product/{id}', 'ProductController@EditProduct')->name('edit-product');
Route::post('/update-product/{id}','ProductController@UpdateProduct')->name('update-product');

//Import Route
Route::get('/import-product','ProductController@importproduct')->name('import.product');
Route::get('/importproductinsert','ProductController@export')->name('export_route');
Route::post('/import','ProductController@import')->name('import_route');



//Expense routes are here---------------------
Route::get('/add-expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@InserExpense')->name('insert-expense');
Route::get('/today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense')->name('edit-today-expense');
Route::post('/update-expense/{id}','ExpenseController@UpdateExpense')->name('update-expense');
Route::get('/monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('/previousyear-expense','ExpenseController@PreviousYearlyExpense')->name('previous.yearly.expense');
//monthly more expenses----
Route::get('/january-expense','ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense','ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense','ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense','ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense','ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense','ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense','ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense','ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense','ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense','ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense','ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense','ExpenseController@DecemberExpense')->name('december.expense');


//Attendences routes are here-----------------------
Route::get('/take-attendence','AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@InsertAttendence')->name('insert_attendence');
Route::get('/all-attendence','AttendenceController@AllAttendence')->name('all.attendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@editattendence')->name('edit-attendence');
/*Route::post('/update-attendence','AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{edit_date}', 'AttendenceController@ViewAttednece');*/



//setting routes
Route::get('/website-setting','SettingsController@Setting')->name('setting');
Route::post('/insert.setting', 'SettingsController@insertsetting')->name('insert.setting');
Route::get('/show', 'SettingsController@show')->name('show');
Route::get('/edit/{id}', 'SettingsController@edit')->name('edit');
Route::get('/view-customer/{id}', 'SettingsController@viewcustomer')->name('view-customer');
Route::get('/delete-customer/{id}', 'SettingsController@deletecustomer')->name('delete-customer');


//Pos-poin of sel
Route::get('/pos','PosController@pos')->name('pos');
//pending orders
Route::get('pending','PosController@pending')->name('pending');
Route::get('view_pending_sig/{id}','PosController@viewpendingsig')->name('view-pending-sig');
Route::get('seccessorder','PosController@seccessorder')->name('seccessorder');
Route::get('order_done/{id}','PosController@orderdone')->name('order_done');



//Card-----------
Route::post('/add-cart', 'CardController@index');
Route::post('/cart-update/{rowId}', 'CardController@update')->name('cart-update');
Route::get('/cart-remove/{rowId}', 'CardController@cartremove')->name('cart-remove');


Route::post('/cart-remove', 'CardController@invoicecreate')->name('invoice_create');

//final invoice
Route::post('finalvoice','CardController@finalinvoice')->name('final.invoice');

