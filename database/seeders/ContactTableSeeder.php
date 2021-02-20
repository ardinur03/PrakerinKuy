<?php

namespace Database\Seeders;

use App\Models\Contact;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory(Contact::class, 10)->create();
        Contact::factory()
            ->count(10)
            ->create();
    }
}
