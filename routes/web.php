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

use App\Models\Address;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function() {
   $user = User::findOrFail(1);
   $address = new Address(['name' => '4433 Pauline Av NY NY 11218']);
   $user->address()->save($address);
});

Route::get('/update', function() {
   $address = Address::where('user_id', 1)->first(); //whereUserId(1)
   $address->name = "4353 Updated Av, Alaska";
   $address->save();
});

Route::get('/read', function() {
   $user = User::findOrFail(1);
   echo $user->address->name;
});

Route::get('/delete', function() {
   $user = User::findOrFail(1);
   $user->address()->delete();
});
