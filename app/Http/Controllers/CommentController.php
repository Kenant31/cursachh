<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function show($id)
    {
        $posts = Comment::find($id)->where('teacher_id','=',$id)->get();
        return response()->json([
            'comments' => $posts,
        ]);
    }

    public function store(Request $request,$teacher_id){
        if (Auth::check()) {
            $request->validate([
                'comment_body' => 'required',

            ]);
            $teacher = Teacher::find($teacher_id);

            Comment::create([
                'comment_body' => $request->comment_body,
                'teacher_id' => $teacher->id,
                 'user_id' => Auth::id(),
                ]
            );
        }
        return response()->json([
            'status' => 'success',
            'comment' => $request->comment_body,
        ]);

    }

    public function update($id,$comm, Request $request){

        $request->validate([
            'comment_body' => 'required',

        ]);
        $comment = Comment::find($comm);
        if (((Auth::check() && (Auth::id() == $comment->user_id))) || auth()->user()->hasRole('super-user') || auth()->user()->hasRole('moderator')){
            $comment->update($request->all());
            return response()->json([
                'status' => 'comment updated',
            ]);
        }
        else{
            return response()->json([
                'status' => 'it isnt your comment',
            ]);
        }

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
        $comment = Comment::find($comm);
        if ((Auth::check() && (Auth::id() == $comment->user_id)) || auth()->user()->hasRole('super-user') || auth()->user()->hasRole('moderator')) {
            $comment->delete();
            return response()->json([
                'status' => 'comment deleted',
            ]);
        }
        else{
            return response()->json([
                'status' => 'it isnt your comment',
            ]);
        }
        return redirect()->back()->with('status', 'Comment deleted!');
    }
}
