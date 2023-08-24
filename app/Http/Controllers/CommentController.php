<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('updated_at', 'desc')->get();
        return view('comment.index', compact('comments'));
    }
    
    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|string',
            'total_good' => 'required|int',
            'total_bad' => 'required|int',
            'traffic_accident_id' => 'required|int',
        ]);

        $comment = new Comment();
        $comment->comment_text = $validatedData['comment_text'];
        $comment->total_good = $validatedData['total_good'];
        $comment->total_bad = $validatedData['total_bad'];
        $comment->user_id = Auth::id();
        $comment->traffic_accident_id = $validatedData['traffic_accident_id'];
        $comment->save();

        return redirect()->route('comment.index')->with('success', '投稿が作成されました');
    }

    public function myComment()
    {
        $comments = Comment::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-comments', compact('comments'));
    }

    public function edit($id)
    {
        $post = Comment::findOrFail($id);
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|string',
            'total_good' => 'required|int',
            'total_bad' => 'required|int',
            'traffic_accident_id' => 'required|int',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->comment_text = $validatedData['comment_text'];
        $comment->save();

        return redirect()->route('mycomments')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('mycomments')->with('success', '投稿が削除されました');
    }
}

