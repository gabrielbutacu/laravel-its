<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        //$posts = Post::where('title', 'LIKE', '%'.$search.'%')->get();
        $posts = Post::where(function($query)use($search){
            if($search){
                $query->where('title', 'LIKE', '%'.$search.'%');
            }
        })->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function savePost(Request $request){
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->long_description = $request->input('long_description');
        $post->save();
        return redirect('posts');
    }
}
