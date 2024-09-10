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

    private $startDate = '2024-09-03T03:00:00Z'; // Starting date for fetching data

    public function handle()
    {
        // Fetch DO, RTD (Temperature), and pH data
        $doRtdPhData = $this->fetchData('2210102', $this->startDate);

        // Fetch Ammonia data
        $ammoniaData = $this->fetchData('2588289', $this->startDate);

        // Process and store the data
        foreach ($ammoniaData as $ammoniaFeed) {
            $ammoniaCreatedAt = Carbon::parse($ammoniaFeed['created_at'])->format('Y-m-d H:i:s');
            $closestDoRtdPhFeed = $this->findClosestDoRtdPh($doRtdPhData, Carbon::parse($ammoniaFeed['created_at']));

            // Check if we found a valid closest DO/RTD/pH feed within 15 seconds
            if ($closestDoRtdPhFeed && $this->isWithinTimeLimit($closestDoRtdPhFeed['created_at'], $ammoniaFeed['created_at'], 15)) {
                // Ensure none of the required fields are null before inserting
                if (
                    !is_null($closestDoRtdPhFeed['entry_id']) && !is_null($closestDoRtdPhFeed['field1']) &&
                    !is_null($closestDoRtdPhFeed['field2']) && !is_null($closestDoRtdPhFeed['field3']) &&
                    !is_null($ammoniaFeed['entry_id']) && !is_null($ammoniaFeed['field4'])
                ) {
                    // Insert the combined data into the database (allow duplicates)
                    DB::table('water_qualities')->insert([
                        'entry_id' => $closestDoRtdPhFeed['entry_id'],
                        'field1' => (float) $closestDoRtdPhFeed['field1'],
                        'field2' => (float) $closestDoRtdPhFeed['field2'],
                        'field3' => (float) $closestDoRtdPhFeed['field3'],
                        'ammonia_entry_id' => (int) $ammoniaFeed['entry_id'],
                        'field4' => (float) $ammoniaFeed['field4'],
                        'created_at' => $ammoniaCreatedAt, // Use ammonia's timestamp
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $this->info('Data fetched and stored successfully.');
    }

    /**
     * Fetch data from a ThingSpeak channel starting from a given date.
     *
     * @param string $channelId
     * @param string $startDate
     * @return array
     */
    private function fetchData($channelId, $startDate)
    {
        $response = Http::withOptions(['verify' => false])->get("https://api.thingspeak.com/channels/{$channelId}/feeds.json", [
            'start' => $startDate,
        ]);

        return $response->json()['feeds'];
    }

    /**
     * Find the closest DO/RTD/pH reading to the given ammonia timestamp.
     *
     * @param array $doRtdPhData
     * @param Carbon $timestamp
     * @return array|null
     */
    private function findClosestDoRtdPh(array $doRtdPhData, Carbon $timestamp)
    {
        $closest = null;
        $smallestDiff = null;

        foreach ($doRtdPhData as $doRtdPhFeed) {
            $doRtdPhTimestamp = Carbon::parse($doRtdPhFeed['created_at']);
            $diff = $timestamp->diffInSeconds($doRtdPhTimestamp);

            if (is_null($smallestDiff) || $diff < $smallestDiff) {
                $smallestDiff = $diff;
                $closest = $doRtdPhFeed;
            }
        }

        return $closest;
    }

    /**
     * Check if the time difference between two timestamps is within a specified limit.
     *
     * @param string $time1
     * @param string $time2
     * @param int $secondsLimit
     * @return bool
     */
    private function isWithinTimeLimit($time1, $time2, $secondsLimit)
    {
        $diffInSeconds = Carbon::parse($time1)->diffInSeconds(Carbon::parse($time2));

        return $diffInSeconds <= $secondsLimit;
    }
}
