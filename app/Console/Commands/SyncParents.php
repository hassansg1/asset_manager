<?php

namespace App\Console\Commands;

use App\Models\Location;
use App\Models\Parentable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class SyncParents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:parents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $locations = Location::all();
        foreach ($locations as $location)
        {
            $model = config('models.'.$location->type);
            $model = App::make($model);
            $model = $model->where('rec_id',$location->rec_id)->first();
            $parent = $model->parentModel();
            if($parent)
            {
                $parentLocation = Location::where('rec_id',$parent->rec_id)->first();
                $location->parent_id = $parentLocation->id;
                $location->save();
            }
        }

        return Command::SUCCESS;
    }
}
