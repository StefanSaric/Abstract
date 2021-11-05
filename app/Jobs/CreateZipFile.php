<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use ZipArchive;


class CreateZipFile implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->name = $file->name;
        $this->file_path = $file->url;
        $this->zip_path = $file->zip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $zip = new ZipArchive;
        $zip->open( $this->zip_path,ZipArchive::CREATE);
        $zip->addFile($this->file_path, $this->name);
        $zip->close();
    }
}
