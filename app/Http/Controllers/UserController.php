<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'image' => ['required']
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if($validator->fails() && $tmp_file) {
            Storage::deleteDirectory('posts/tmp/'. $tmp_file->folder);
            $tmp_file->delete();
        }

        if($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        if($tmp_file) {
            Storage::copy('posts/tmp/'. $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $tmp_file->folder . '/' . $tmp_file->file_name,
            ]);

            Storage::deleteDirectory('posts/tmp/'. $tmp_file->folder);
            $tmp_file->delete();

            return redirect('/');
        }
    }


    public function tmpUpload(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $file_name);

            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }


    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if($tmp_file) {
            Storage::deleteDirectory('posts/tmp/'. $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

}
