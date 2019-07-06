<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ConfigurationResource;
use App\Model\Color;
use App\Model\Dimension;
use App\Model\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ConfigurationTransformer;
use App\Transformers\ColorTransformer;

class SiteController extends Controller
{
    public function index(Request $request){
        $configuration = Configuration::get();
        $color = Color::with('configuration')->get();
        $dimension = Dimension::with('type')->get();
        return fractal()
            ->collection($configuration, $color, $dimension)
            ->transformWith(new ConfigurationTransformer)
            ->toArray();
    }
}
