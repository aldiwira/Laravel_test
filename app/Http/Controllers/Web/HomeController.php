<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }
    public function login(Request $request)
    {
        $req = Request::create(
            'api/login',
            'POST',
            ['email' => $request->get('email'), 'password' => $request->get('password')],

        );
        $res = json_decode(json_encode(Route::dispatch($req)->original));
        if ($res->status) {
            Session::push('token', $res->data->token);
            Session::push('iduser', $res->data->user->id);
            if ($res->data->user->type == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->route('index')->with('error', "Wrong email or password");
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('index');
    }
}
