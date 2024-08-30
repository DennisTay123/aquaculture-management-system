<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FetchThingSpeakData extends Command
{
    protected $signature = 'fetch:thingspeak-data';
    protected $description = 'Fetch data from ThingSpeak and store in the database';

    public function handle()
    {
        // $response = Http::get('https://api.thingspeak.com/channels/2210102/feeds.json');
        $response = Http::withOptions(['verify' => false])->get('https://api.thingspeak.com/channels/2210102/feeds.json', ['results' => 8000]);

        $data = $response->json();

        foreach ($data['feeds'] as $feed) {
            $entryId = $feed['entry_id'];

            // Check if the entry_id already exists
            $exists = DB::table('aquaculture')->where('entry_id', $entryId)->exists();

            if (!$exists) {
                DB::table('aquaculture')->insert([
                    'created_at' => Carbon::parse($feed['created_at']),
                    'entry_id' => $entryId,
                    'field1' => $feed['field1'] ? (float) $feed['field1'] : null,
                    'field2' => $feed['field2'] ? (float) $feed['field2'] : null,
                    'field3' => $feed['field3'] ? (float) $feed['field3'] : null,
                    'field4' => $feed['field4'] ? (float) $feed['field4'] : null,
                    'updated_at' => now(),
                ]);
            }
        }

        $this->info('Data fetched and stored successfully.');
    }
}

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

// class FetchThingSpeakData extends Command
// {
//     protected $signature = 'fetch:thingspeak-data';
//     protected $description = 'Fetch data from ThingSpeak and store in the database';

//     public function handle()
//     {
//         $channelId = 2210102;
//         $resultsPerPage = 8000; // Maximum results per request
//         $totalEntries = $this->getTotalEntries($channelId);
//         $pages = ceil($totalEntries / $resultsPerPage);
//         $allFeeds = [];

//         for ($page = 0; $page < $pages; $page++) {
//             $offset = $page * $resultsPerPage;
//             $feeds = $this->fetchFeeds($channelId, $resultsPerPage, $offset);
//             $allFeeds = array_merge($allFeeds, $feeds);
//         }

//         $this->storeFeeds($allFeeds);
//         $this->info('Data fetched and stored successfully.');
//     }

//     private function getTotalEntries($channelId)
//     {
//         $response = Http::withOptions(['verify' => false])->get("https://api.thingspeak.com/channels/{$channelId}/feeds.json?results=1");
//         if ($response->successful()) {
//             $data = $response->json();
//             return $data['channel']['last_entry_id'];
//         }
//         return 0;
//     }

//     private function fetchFeeds($channelId, $resultsPerPage, $offset)
//     {
//         $response = Http::withOptions(['verify' => false])->get("https://api.thingspeak.com/channels/{$channelId}/feeds.json", [
//             'results' => $resultsPerPage,
//             'offset' => $offset
//         ]);

//         if ($response->successful()) {
//             return $response->json()['feeds'];
//         }

//         return [];
//     }

//     private function storeFeeds($feeds)
//     {
//         foreach ($feeds as $feed) {
//             $entryId = $feed['entry_id'];

//             // Check if the entry_id already exists
//             $exists = DB::table('aquaculture')->where('entry_id', $entryId)->exists();

//             if (!$exists) {
//                 DB::table('aquaculture')->insert([
//                     'created_at' => Carbon::parse($feed['created_at']),
//                     'entry_id' => $entryId,
//                     'field1' => $feed['field1'] ? (float) $feed['field1'] : null,
//                     'field2' => $feed['field2'] ? (float) $feed['field2'] : null,
//                     'field3' => $feed['field3'] ? (float) $feed['field3'] : null,
//                     'field4' => $feed['field4'] ? (float) $feed['field4'] : null,
//                     'updated_at' => now(),
//                 ]);
//             }
//         }
//     }
// }