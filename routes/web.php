<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentationController;
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

Route::get('/', [DocumentationController::class, 'index']);
Route::get('/{page}', [DocumentationController::class, 'show'])->where('page', '(.*)')->name('documentation.show');

//Route::get('/docs', function () {
//    return redirect('blogs');
//});