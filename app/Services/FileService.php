<?php

namespace App\Services;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;


class FileService
{

    public function storeFile ($name, $file)
    {
        if ($name != null) {
            $file_name = $name . '.' . $file->getClientOriginalExtension();
            $zip_name = $name . '.zip';
        } else {
            $file_name = $file->getClientOriginalName();
            $zip_name = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . '.zip';
        }

        $file_path = public_path('files/') . $file_name;
        move_uploaded_file($file,  $file_path);

        $zip_path = public_path('zip/') . $zip_name;

        $file = Files::create(['user_id' => Auth::user()->id, 'name' => $file_name, 'url' => $file_path, 'zip' => $zip_path]);

        return $file;
    }

}


?>