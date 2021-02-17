<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class GalleryController extends Controller
{
    public function gallery()
    {
        return view("gallery");
    }
    public function post()
    {
        $post = Post::with('user')->get();
        return view("post",compact('post'));
    }
}
