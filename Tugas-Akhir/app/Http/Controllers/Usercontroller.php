<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    //idex, store, update, destroy
    function index(){
        $data['title'] = 'Pengguna';
        $data['breadcrumbs'][]=[
            'title'=> 'Dashboard',
            'url'=> route('dashboard')
        ];
        $data['title'] = 'Pengguna';
        $data['breadcrumbs'][]=[
            'title'=> 'user',
            'url'=> 'users.index'
        ];

        $users = User::orderBy('name')->get();
        $data['users'] = $users;

        return view('pages.user.index' , $data);

    }
}
