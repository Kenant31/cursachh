<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $posts = Teacher::filter($request)->get();
        return response()->json([
            'teachers' => $posts,
        ]);
    }

    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'text' => 'required|string',
                'genre' => 'required|string|max:150',
                'price' => 'required|int',
            ]);

            $posts = Teacher::create([
                'name' => $request -> name,
                'text' => $request -> text,
                'genre' => $request -> genre,
                'price' => $request -> price,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Teacher page created successfully',
                'teachers' => $posts,
            ]);

    }

    public function show($id)
    {
        $posts = Teacher::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);
    }

    public function update($id, Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'text' => 'required|string',
                'genre' => 'required|string|max:150',
                'price' => 'required|int',
            ]);

            $posts = Teacher::findOrFail($id);
            $posts->name = $request->name;
            $posts->text = $request->text;
            $posts->genre = $request->genre;
            $posts->price = $request->price;
            $posts->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Teacher page updated successfully',
                'teachers' => $posts,
            ]);
    }

    public function destroy($id)
    {
            $posts = Teacher::findOrFail($id);
            $posts->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Teacher page deleted successfully',
                'posts' => $posts,
            ]);
    }

    public function search(Request $request)
    {
        $get_name = $request -> search_name;

        if(Teacher::where('name','like',"%".$get_name."%")->doesntExist()){
            return response()->json([
                'status' => 'error',
                'message' => 'There are nothing',
            ]);}
        else{
            $teachers = Teacher::where('name','like',"%".$get_name."%")->get();
            return response()->json([
                'teachers' => $teachers,
            ]);
        }
    }
}
