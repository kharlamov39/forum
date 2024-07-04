<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Topic;

class ShowTopics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-topics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все темы';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = Topic::all();

        $this->table(
            ['id', '', '', 'text', 'body', 'user_id', 'is_published'],
            $users->toArray()
        );

        return 0;

    }
}
