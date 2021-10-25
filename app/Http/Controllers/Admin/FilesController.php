<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class FilesController extends Controller
{
    public function index ()
    {
        $files = Files::where('user_id', '=', Auth::user()->id)->where('show', '=', '1')->get();

        return view ('admin.files.allfiles',['active' => 'allFiles', 'files' => $files]);
    }

    public function create ()
    {
         return view ('admin.files.create', ['active' => 'addFile']);
    }

    public function store (Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $path = 'files/';
        $file = $request->file('file');

        if( $request->name != null)
            $name = $request->name;
        else
            $name = $file->getClientOriginalName();

        // store raw file
        $file_path = public_path($path) . $file->getClientOriginalName();
        move_uploaded_file($file, $file_path);
        $url = $path. $file->getClientOriginalName();

        $one_file = Files::create(['user_id' => Auth::user()->id, 'name' => $name ,'url' => $url, 'zip' => 1]);



        Session::flash('message', 'success_'.__('Fajl je uspešno dodat!'));

        return redirect ('admin/files');
    }

    public function delete ($id) {

        $document = Files::find($id);
        $document->show = 0;
        
        $document->save();

        return redirect ('admin/files');
    }

    public function show($id)
    {
        $file = Files::where('id', '=', $id)->first();
        //dd($file->url);

        return response()->file($file->url);
    }
}
