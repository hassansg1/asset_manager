<?php

namespace App\Console\Commands;

use App\Models\NozomiData;
use App\Models\NozomiSettings;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Illuminate\Console\Command;
use Log;
class NozomiDataTaskScheduling extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nozomi:data';

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
        Log::info('Cron Job Started');
        $nozomicredentilas = NozomiSettings::first();
        $nozomiURL = $nozomicredentilas ? $nozomicredentilas->path : 'https://192.168.100.40/api/open/query/do';
        $nozomiUsername = $nozomicredentilas->username;
        $nozomiPassword = $nozomicredentilas->password;
        $client = new Client([
            'verify' => false
        ]);
        $request = $client->get($nozomiURL.'?query=assets', ['auth' => [$nozomiUsername, $nozomiPassword, 'verify'=>false]]);
        $chnageDefaultConfigration = new ImageAnnotatorClient([
            'transportConfig' => [
                'rest' => [
                    'httpHandler' => function (RequestInterface $request, array $options = []) use ($client) {
                        return $client->sendAsync($request, $options);
                    }
                ]
            ]
        ]);
        $response = $request->getBody()->getContents();
        $jsonData = json_decode($response);
        foreach ($jsonData->result as $result){
            $result->ip = implode(" ", $result->ip);
            $result->appliance_hosts = implode(" ", $result->appliance_hosts);
            $result->appliance_sites = implode(" ", $result->appliance_sites);
            $result->mac_address = implode(" ", $result->mac_address);
            $result->vlan_id = implode(" ", $result->vlan_id);
            $result->mac_vendor = implode(" ", $result->mac_vendor);
            $result->roles = implode(" ", $result->roles);
            $result->protocols = implode(" ", $result->protocols);
            $result->nodes = implode(" ", $result->nodes);
            $result->zones = implode(" ", $result->zones);
            NozomiData::updateOrCreate(
                [
                    'ip_address' => $result->ip,
                ],[
                    'data' => json_encode($result),
                ]
            );
        }

    }
}
