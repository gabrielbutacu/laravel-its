<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostResource;

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
        //metodo con compact
        //return view('posts.index', compact('posts'));
        //metodo con array
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function indexPosts(Request $request){
        $search = $request->input('search');
        /*
        uso senza resources, filtrando direttamente nella query
        $posts = Post::select('id', 'title', 'description')->where(function($query)use($search){
            if($search){
                $query->where('title', 'LIKE', '%'.$search.'%');
            }
        })->get();
        return $posts;
        */
        //seconda modalità utilizzando le resource
        $posts = Post::where(function($query)use($search){
            if($search){
                $query->where('title', 'LIKE', '%'.$search.'%');
            }
        })->get();
        return PostResource::collection($posts);
    }

    public function create(){
        return view('posts.create');
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        //find se non trova un riscontro ritorna null
        //$post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function savePost(Request $request){
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->long_description = $request->input('long_description');
        //$post->user_id = Auth::user()->id;
        $post->user_id = Auth::id();

        $post->save();
        return redirect('posts');
    }

    public function updatePost($id, Request $request){
        $request->validate([
            'title' => 'required'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->long_description = $request->input('long_description');
        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect('posts');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
    }
}
