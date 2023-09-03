<?php

namespace QRFeedz\Services\Jobs\System;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class CleanLogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Cleans logs that are older than 30 days (log channel=daily).
     *
     * @return void
     */
    public function handle()
    {
        $logPath = storage_path('logs/');
        $directories = File::directories($logPath);

        foreach ($directories as $directory) {
            $date = basename($directory);
            $deleteDate = now()->subDays(30);

            if (strtotime($date) <= $deleteDate->getTimestamp()) {
                File::deleteDirectory($directory);
            }
        }
    }
}
