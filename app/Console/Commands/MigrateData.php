<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\ColumnResult;

class MigrateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:data';

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
        $tables = ['companies','units', 'sites', 'sub_sites', 'buildings', 'rooms', 'cabinets', 'network_assets', 'computer_assets', 'lone_assets'];

        foreach ($tables as $table) {
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
            $columns = array_diff($columns, ['id']);
            $data = DB::table($table)->get();
            foreach ($data as $key => $value) {
                $arr = [];
                foreach ($columns as $column) {
                    $arr[$column] = $value->{$column};
                }
                $arr['type'] = $table;
                DB::table('locations')->insert($arr);
            }

        }
        return Command::SUCCESS;
    }
}
