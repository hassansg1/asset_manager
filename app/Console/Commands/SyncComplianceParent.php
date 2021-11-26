<?php

namespace App\Console\Commands;

use App\Models\Clause;
use App\Models\Compliance;
use Illuminate\Console\Command;

class SyncComplianceParent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:syncCompliantParent';

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
        $compliances = Clause::all();
        foreach ($compliances as $compliance)
        {
            $clause = $compliance->number;
            $ex = explode('-',$clause);
            array_pop($ex);
            if(count($ex) > 0)
            {
                $imp = implode('-',$ex);
                $parent = Clause::where('number',$imp)->first();
                if($parent)
                {
                    $compliance->parent_id = $parent->id;
                    $compliance->save();
                }
            }
        }
        return 0;
    }
}
