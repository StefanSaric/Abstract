<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index ()
    {
        $files = Files::all();

        return view ('admin.files.allfiles',['active' => 'allFiles', 'files' => $files]);
    }

    public function create ()
    {
         return view ('admin.files.create', ['active' => 'addFile']);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'files' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $document_id = 0;
        $path = 'files/';
        if ($request->file('files') != null) {
            foreach ($request->file('documents') as $document) {
                $document_id++;
                $document_path = public_path($path) . $document->getClientOriginalName();
                move_uploaded_file($document, $document_path);
                $url = $path. $document->getClientOriginalName();
                $one_document = Document::create(['user_id' => Auth::user()->id,'url' => $url, 'name' => $document->getClientOriginalName(), 'type' => $request->type, 'type_id' => $request->type_id]);
            }
        }

        Session::flash('message', 'success_'.__('Dokument je uspešno dodat!'));

        return redirect ('admin/documents');
    }

    public function delete ($id) {

        $document = File::find($id);
        $document->show = 1;
        
        $document->save();

        return redirect ('admin/files');
    }
}
