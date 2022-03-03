<?php

namespace App\Console\Commands;

use App\Models\Clause;
use App\Models\StandardClause;
use Illuminate\Console\Command;

class MigrateClauses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MigrateClauses';

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
        $parents = Clause::where('parent_id')->get();
        foreach ($parents as $parent) {
            $parentNode = StandardClause::create([
                'standard_id' => $parent->standard_id,
                'number' => $parent->number,
                'short_number' => $parent->short_number,
                'title' => $parent->title,
                'description' => $parent->description,
            ]);
            $childs = Clause::where('parent_id', $parent->id)->get();
            foreach ($childs as $child) {
                $node = StandardClause::create([
                    'standard_id' => $child->standard_id,
                    'number' => $child->number,
                    'short_number' => $child->short_number,
                    'title' => $child->title,
                    'description' => $child->description,
                ]);
                $parentNode->appendNode($node);
            }
        }
        return 0;
    }
}
