<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		User::create([
			'name'     => 'Root',
			'email'    => 'root@scriba.fr',
            'admin'    => true,
			'password' => bcrypt('password')
		]);
    }
}

