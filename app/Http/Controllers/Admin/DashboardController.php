<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(){

        $n_post = Post::count();
        $posts = Post::all();
        return view('admin.index', compact('n_post', 'posts'));
    }
}
