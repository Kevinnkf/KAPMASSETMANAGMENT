<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $parent = "Dashboard";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "breadcrumb" => [
                null => $this->parent,
            ],
            "data" => session('userdata')
        ];

        return view('dashboard.index', $data);
    }
}
