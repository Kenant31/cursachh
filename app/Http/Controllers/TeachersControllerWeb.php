<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersControllerWeb extends Controller
{
    public function index(Request $request)
    {
//        $posts = Teacher::orderBy('created_at', 'desc')->get();
          $posts = Teacher::filter($request)->get();

        return view('teachers', compact([
            'posts'
        ]));
    }

    public function create()
    {
        return view('add-new-teachers');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'genre' => 'required|string|max:150',
            'price' => 'required|int',
        ]);

        Teacher::create($request->all());

        return redirect()->back()->with('status', 'Teacher added!');
    }

    public function edit($id)
    {
        $post = Teacher::findOrFail($id);

        return view('edit-new-teacher', compact([
            'post'
        ]));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'genre' => 'required|string|max:150',
            'price' => 'required|int',
        ]);

        $post = Teacher::findOrFail($id);
        $post->update($request->all());

        return redirect()->back()->with('status', 'Teacher updated!');
    }

    public function delete($id)
    {
        Teacher::findOrFail($id)->delete();

        return redirect()->route('teachers')->with('status', 'Teacher deleted!');
    }

    public function search(Request $request)
    {
        $get_name = $request -> search_name;
        $posts = Teacher::where('NAME','LIKE',"%".$get_name."%")->get();
        return view('teachers', compact([
            'posts'
        ]));

    }
}
