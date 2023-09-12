<?php

namespace QRFeedz\Services\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishAssets extends Command
{
    protected $signature = 'qrfeedz:publish';

    protected $description = 'Publish assets from various directories to base app.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $directoriesToPublish = config('qrfeedz.system.publish');

        if (empty($directoriesToPublish)) {
            $this->error('No directories found in config.');

            return;
        }

        foreach ($directoriesToPublish as $directory) {
            $this->info("Processing: {$directory}");

            // Try finding source directories
            $sourcePaths = [
                base_path("packages/qrfeedz/{$directory}/resources/assets"),
                base_path("vendors/brunocfalcao/{$directory}/resources/assets"),
            ];

            $sourcePath = null;

            foreach ($sourcePaths as $path) {
                if (File::exists($path)) {
                    $sourcePath = $path;
                    break;
                }
            }

            if (! $sourcePath) {
                $this->warn("Source folder for {$directory} does not exist.");

                continue;
            }

            // Destination directory
            $destinationPath = base_path("resources/{$directory}/assets");

            // Copy the directory
            if (File::copyDirectory($sourcePath, $destinationPath)) {
                $this->info("Successfully copied to {$destinationPath}");
            } else {
                $this->error("Failed to copy assets for {$directory}");
            }
        }
    }
}
