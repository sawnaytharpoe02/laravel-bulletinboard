<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index()
    {
      
        return view('posts.index', ['posts' => Post::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);
        return redirect('/')->with('message', 'Post created successfully!');
    }

    public function show(Post $postId)
    {
        return view('posts.show', ['post' => $postId]);
    }

    public function update(Request $request, Post $postId)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $postId->update($formFields);

        return redirect('/')->with('message', 'Post updated successfully!');
    }

    public function destroy(Post $postId)
    {
        $postId->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }

    public function fileImport(Request $request)
    {
        $request->validate([
            'excel-file' => 'required|mimes:xlsx,csv'
        ]);
        $import = new PostsImport();
        $import->import($request->file('excel-file'));
        if($import->errors()) {
            return redirect('/')->with('message', $import->errors()->count() . ' data duplicated');
        }
        return back()->with('message', 'Imported successfully!');
    }

    public function fileExport()
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }
}
