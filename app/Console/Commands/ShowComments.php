<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;

class ShowComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все комментарии';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = Comment::all();

        $this->table(
            ['id', '', '', 'text', 'topic_id', 'user_id'],
            $roles->toArray()
        );

        return 0;

    }
}
