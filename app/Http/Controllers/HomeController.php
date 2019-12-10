<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   


        $posts = Post::orderBy('created_at', 'DESC')->paginate(2);

        $categories = Category::all();
        return view('front/home', compact('posts', 'categories'));
    }
    
    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        $categories = Category::all();
        $comments = $post->comments()->whereisActive(1)->orderBy('created_at', 'DESC')->get();
        return view('post', compact('post', 'comments', 'categories'));

    }
    public function category($id){
        $categories = Category::findOrFail($id);
        $posts = Post::orderBy('created_at', 'DESC')->where('category_id', $id)->paginate(2);
         return view('catposts', compact('categories', 'posts'));
    }
}
