<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\TrafficAccident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $comments = Comment::where('traffic_accident_id', $id)->orderBy('updated_at', 'desc')->get();
        return view('comment.index', compact('comments', 'id'));
    }
    
    public function create($id)
    {
        return view('comment.create', compact(('id')));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->comment_text = $validatedData['comment_text'];
        $comment->user_id = Auth::id();
        $comment->traffic_accident_id = $id;
        $comment->save();

        return redirect()->route('comment.index', ['id'=>$id])->with('success', '投稿が作成されました');
    }

    public function myComment($id)
    {
        $comments = Comment::where('user_id', Auth::id())->where('traffic_accident_id', $id)->orderBy('updated_at', 'desc')->get();
        return view('my-comments', compact('comments'));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->comment_text = $validatedData['comment_text'];
        $tr_id = $comment->traffic_accident_id;
        $comment->save();
        return redirect()->route('mycomments',['id'=>$tr_id])->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $tr_id = $comment->traffic_accident_id;
        $comment->delete();

        return redirect()->route('mycomments',['id'=>$tr_id])->with('success', '投稿が削除されました');
    }
}

