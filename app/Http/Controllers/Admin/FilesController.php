<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CreateZipFile;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Monolog\Handler\SlackWebhookHandler;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

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


        if( $request->name != null) {
            $name = $request->name . '.' . $file->getClientOriginalExtension();
            $zip_name = $request->name . '.zip';
        }
        else {
            $name = $file->getClientOriginalName();
            $zip_name = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . '.zip';
        }

        // store raw file
        $file_path = public_path('files/') . $name;
        move_uploaded_file($file, $file_path);

        //path to zip file
        $zip_path = public_path('zip/').$zip_name;

        //call Laravel queue job to create zip file
        dispatch(new CreateZipFile($name,$file_path,$zip_path));

        //store data to database
        $one_file = Files::create(['user_id' => Auth::user()->id, 'name' => $name ,'url' => $file_path, 'zip' => $zip_path]);

        Session::flash('message', 'success_'.__('Fajl je uspešno dodat!'));

        return redirect ('admin/files');
    }

    public function delete ($id) {

        $file = Files::find($id);
        $file->show = 0;

        $file->save();

        return redirect ('admin/files');
    }

    public function show($id)
    {
        $file = Files::find($id);
        //dd($file->url);

        return response()->file($file->url);
    }
}
