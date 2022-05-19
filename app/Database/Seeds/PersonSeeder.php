<?php

namespace App\Database\Seeds;

use App\Models\PersonModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $personModel = new PersonModel();

        // Creating fake data
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $personModel->save(
                [
                    'person_firstname' => $faker->firstName,
                    'person_lastname' => $faker->lastName,
                    'person_email' => $faker->email,
                    'person_password' => password_hash($faker->password, PASSWORD_BCRYPT),
                    'created_at' => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at' => Time::now()
                ]
            );
        }
    }
}
