<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();
        $this->createUser();
    }

    private function createAdminUser()
    {
       $user = factory(User::class)->create([
           'type' => \App\User::TYPE_ADMIN,
           'name' => 'Admin',
           'email' => 'admin@videoIzle.com',
           'mobile' => '+9891111111'
       ]);

        $this->command->info('created admin user');
    }

    private function createUser()
    {
        $user = factory(User::class)->create([
            'name' => 'user1',
            'email' => 'user1@videoIzle.com',
            'mobile' => '+989222222222'
        ]);

        $this->command->info('created user');
    }
}
