<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function index(){

        $posts= Post::orderBy('id', 'desc');
        $succsess= true;
        $response= [
            'succsess'=>$succsess,
            'results'=>$posts,
        ];
        return response()->json($response);
    }
}
