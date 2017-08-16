<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::latest()->get();

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {

    	//$post = Post::find($id);

    	return view('posts.show', compact('post'));
    }
 	
 	public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {

    		// Create a new post using the request data

    		// $post = new Post;

    		// $post->title = request('title');

    		// $post->body = request('body');

    		//Save it to the database

    		//$post->save();

    	$this->validate(request(), [

    			'title' => 'required|min:2',

    			'body' => 'required|min:2'

    		]);

    	Post::create(request(['title', 'body']));


    	//Redirect to the home page

    	return redirect('/');
    }
}

