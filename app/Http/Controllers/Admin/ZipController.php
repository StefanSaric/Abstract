<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use ZipArchive;

class ZipController extends Controller
{
    public function setPassword($id)
    {
        $file = Files::find($id);
        return view ('admin.zip.create', ['active' => 'addFile', 'file' => $file]);
    }

    public function protectZipFile (Request $request)
    {
        //dd($request->all());
        $file = Files::find($request->id);

        $zip = new ZipArchive();

        $zip->open($file->zip,ZipArchive::CREATE);
        $zip->setEncryptionName($file->name, ZipArchive::EM_AES_256, $request->password);
        $zip->close();

        return redirect ('admin/files');
    }
}
