<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $key = Session::get('token')[0];
        $id = Session::get('iduser')[0];
        $req = Request::create(
            'api/user/' . $id,
            'GET',
            [],
            ['headers' => [
                'Authorization' => 'Bearer ' . $key,
                'Accept' => 'application/json',
            ],]

        );

        $res = json_decode(json_encode(Route::dispatch($req)->original));

        return view('user/index', ["data" => $res->data]);
    }
}
