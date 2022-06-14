<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$teacher_id){
        $request->validate([
            'comment_body' => 'required',

        ]);
        $teacher = Teacher::find($teacher_id);

        Comment::create([
                'comment_body'=>$request->comment_body,
                'teacher_id' => $teacher->id,
                'user_id'=> Auth::id(),
            ]
        );

        return to_route('detail', $teacher);
    }

    public function update($id,$comm, Request $request){
        $request->validate([
            'comment_body' => 'required',

        ]);
        $comment = Comment::find($comm);
        $comment->update($request->all());
        return redirect()->route('detail', $id)->with('status', 'Comment edited!');
    }
    public function edit($id,$comm, Request $request){
        $comment = Comment::find($comm);
        $posts = Teacher::findOrFail($id);
        return view('comments.comment-edit', compact([
            'comment','posts'
        ]));
    }

    public function delete($id,$comm){
        $teacher = Comment::find($comm);
        $teacher->delete();

        return redirect()->back()->with('status', 'Comment deleted!');
    }
}
