<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    // Index Method To Load Reference Page
    public function index() {
        return view('reference');
    }
}
