<?php

namespace App\Controllers;

class Pages extends BaseController
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Home | Aptrabemo'
    //     ];
    //     return view('pages/home', $data);
    // }



    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard Pedagang'
        ];
        return view('pages/dashboard', $data);
    }
}