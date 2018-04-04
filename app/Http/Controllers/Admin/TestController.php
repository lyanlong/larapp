<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function index()
    {
        return '';
    }

    public function uploadForm()
    {
        return view('admin.test.uploadForm');
    }

    public function upload(Request $request)
    {
        $path = $request->file('photos')->store('photos');

        dd($path);
    }
}
