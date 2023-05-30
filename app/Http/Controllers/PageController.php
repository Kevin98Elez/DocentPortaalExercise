<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index($pageName)
    {
        $content = Page::where('title', $pageName)->firstOrFail();
        $pages = Page::all();
        return view('pages', compact('content', 'pages'));
    }
}
