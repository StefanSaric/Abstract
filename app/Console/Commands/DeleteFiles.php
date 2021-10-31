<?php

namespace App\Console\Commands;

use App\Models\Files;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DeleteFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command delete files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //DB::table('files')->where('show', '=', '0')->delete();
        $files = Files::where('show', '=', '0')->get();
        foreach($files as $file) {
            File::delete($file->url);
            File::delete($file->zip);
            $file->delete();
        }
        return Command::SUCCESS;
    }
}
