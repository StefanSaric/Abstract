<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Monolog\Handler\SlackWebhookHandler;
use ZipArchive;
use Illuminate\Support\Facades\File;

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
        // validation for files
        $validator = Validator::make($request->all(),[
            'file' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }


        $file = $request->file('file');


        if( $request->name != null)
            $name = $request->name;
        else
            $name = $file->getClientOriginalName();


        // store raw file
        $file_path = public_path('files/') . $name;
        move_uploaded_file($file, $file_path);


        //create zip file
        $zip_name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).'.zip';
        $zip_path = public_path('zip/').$zip_name;

        $zip = new ZipArchive;

        $zip->open($zip_path,ZipArchive::CREATE);

        $zip->addFile($file_path, $name);
        $zip->close();



        $one_file = Files::create(['user_id' => Auth::user()->id, 'name' => $name ,'url' => $file_path, 'zip' => $zip_path]);

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
