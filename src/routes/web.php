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
    return view('welcome');
});
Route::resource('/expense_reports', 'ExpenseReportController');
Route::get('/expense_reports/{id}/confirmDelete', 'ExpenseReportController@confirmDelete')->name('expense_reports.confirmDelete');
//Route::resource('/expenses', 'ExpenseController');
Route::get('/expense_reports/{expense_report}/expenses/create', 'ExpenseController@create')->name('expense.create');
Route::post('/expense_reports/{expense_report}/expenses', 'ExpenseController@store')->name('expense.store');

Route::get('/expense_reports/{id}/confirmSendEmail', 'ExpenseReportController@confirmSendEmail')->name('expense_reports.confirmSendEmail');
Route::post('/expense_reports/{id}/SendEmail', 'ExpenseReportController@SendEmail')->name('expense_reports.SendEmail');
