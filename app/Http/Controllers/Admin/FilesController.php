<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CallWebhook;
use App\Jobs\CreateZipFile;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FileRequest;
use App\Services\FileService;

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

    public function store (FileRequest $request, FileService $fileservice)
    {

        $file = $fileservice->storeFile($request->name,$request->file);

        dispatch(new CreateZipFile($file));
        //dispatch(new CallWebhook($file_path));


        Session::flash('message', 'success_' . __('Fajl je uspešno dodat!'));
        return redirect('admin/files');
    }


    public function delete (Files $file) {

        $file->show = 0;
        $file->save();

        return redirect ('admin/files');
    }

    public function show(Files $file)
    {
        return response()->file($file->url);
    }
}
