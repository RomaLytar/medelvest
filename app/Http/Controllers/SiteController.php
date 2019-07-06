<?php

namespace App\Http\Controllers;

use App\Model\Configuration;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $configurations = Configuration::with('facades', 'colors', 'media', 'dimension', 'slidingdoors')->latest()->get();
        return view('layouts.front.site', compact('configurations'));
    }
}
