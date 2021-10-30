<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ZipArchive;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;


class CreateZipFile implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$file_path,$zip_path)
    {
        $this->name = $name;
        $this->file_path = $file_path;
        $this->zip_path = $zip_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $zip = new ZipArchive;
        $zip->open($this->zip_path,ZipArchive::CREATE);

        $zip->addFile($this->file_path, $this->name);
        $zip->close();
    }
}
