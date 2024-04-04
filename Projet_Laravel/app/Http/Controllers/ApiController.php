<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class ApiController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    public function show($id)
    {
        $sauces = Sauce::findOrFail($id);
        return response()->json($sauces);
    }
}
