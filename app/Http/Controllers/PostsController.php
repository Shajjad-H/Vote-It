<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\CasServiceProvider as Cas;

use App\Groupe;
use App\Post;
use App\Comment;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts' => Post::userPosts(Cas::user())]);
    }

    public function create()
    {
        return view('posts.create', [
            'posts' => Post::all()
        ]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'groupe' => 'required|min:15'
        ]);
        
        // only get the first groupe the user should send one groupe also
        $groupe = Groupe::getGroupesFromNames($validatedData['groupe'])->all()[0];
        unset($validatedData['groupe']);

        $validatedData['groupe_id'] = $groupe->id;
        $validatedData['user_id'] = Cas::user()->id;
        // the data is formatted to create a new post
        
        $post = Post::create($validatedData);
        
        return view('posts.create', [
            'post_created' => true,
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        if ($post->user_id == Cas::user()->id)
            return view('posts.edit', ['post' => $post]);
        return back();
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Cas::user()->id)
            return back();
        
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required'
        ]);

        $post->update($validatedData);
        
        return $this->index();
        
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function comment(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'comment' => 'required|min:3'
        ]);
        
        $validatedData['user_id'] = Cas::user()->id;
        $validatedData['post_id'] = $post->id;

        Comment::create($validatedData);

        return redirect('/posts/'.$post->id);
    }

    public function editComment(Post $post, Comment $comment)
    {
        return view('comment.edit', [
            'comment' => $comment,
            'post' => $post
        ]);
    }

    public function updateComment(Request $request, Post $post, Comment $comment)
    {
        if ($comment->user_id == Cas::user()->id) {
            
            $validatedData = $request->validate([
                'comment' => 'required|min:3'
            ]);
    
            $comment->update($validatedData);
        }


        return redirect('/posts/'.$post->id);
    }
}
