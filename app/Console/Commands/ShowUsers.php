<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать всех пользователей';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        $this->table(
            ['Id', 'Name', 'Email'],
            $users->toArray()
        );

        return 0;

    }
}
