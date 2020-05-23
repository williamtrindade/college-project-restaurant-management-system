<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		User::create([
				'name'      => 'William',
				'email'     => 'williamtrindade777@gmail.com',
				'password'  => bcrypt('123'),
				'api_token' => 'xMxuLcPfnBHl1TAFAlHPbctXXXthyAyzJdSugA0SqEXCOSkyCY5nPJyc112NJjSw6kyPJRBMC9lVPokc',
			]);
		User::create([
				'name'      => 'Mario',
				'email'     => 'mario@gmail.com',
				'password'  => bcrypt('123'),
				'api_token' => 'mMxuLcPfnBHl1TAFAlHPbctXXXthyAyzJdSugA0SqEXCOSkyCY5nPJyc112NJjSw6kyPJRBMC9lVPokc',
			]);

	}
}
