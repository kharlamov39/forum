<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Profile;

class ShowProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-profiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все профили';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = Profile::all();

        $this->table(
            [],
            $roles->toArray()
        );

        return 0;

    }
}
