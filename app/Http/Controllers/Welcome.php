<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Welcome extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')
            ->where('published', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('welcome', compact('articles'));
    }
}
