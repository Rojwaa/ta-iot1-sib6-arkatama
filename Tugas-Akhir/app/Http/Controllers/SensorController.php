<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    function index(){
        $data['title'] = 'Sensor';
        $data['breadcrumbs'][]= [
            'title' => 'Dashboard',
            'url' => route('dashboard')
        ];
        $data['title'] = 'Sensor';
        $data['breadcrumbs'][]= [
            'title' => 'Sensor',
            'url' => 'sensors.index'
        ];
        return view('pages.sensor.index', $data);
}
}
