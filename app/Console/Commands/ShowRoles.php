<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Показать все роли';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = Role::all();

        $this->table(
            ['Id', 'Name'],
            $roles->toArray()
        );

        return 0;

    }
}
