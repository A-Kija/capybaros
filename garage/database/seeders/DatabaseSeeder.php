<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $faker = Faker::create('lt_LT');
        
        foreach (range(1, 20) as $i) {

            DB::table('mechanics')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
            ]);

        }

        foreach (range(1, 100) as $i) {

            $trucksModels = [
                'Volvo',
                'Man',
                'Scania',
                'Mercedes',
                'Iveco',
                'Renault',
                'DAF',
                'Mitsubishi'
            ];

            DB::table('trucks')->insert([
                'brand' => $faker->randomElement($trucksModels),
                'plate' => $faker->regexify('[A-Z]{3}-[0-9]{3}'),
            ]);

        }

        foreach (range(1, 100) as $i) {

            $mechanics = DB::table('mechanics')->inRandomOrder()->limit(rand(1, 10))->get();

            $mechanicIds = $mechanics->pluck('id')->toArray();

            foreach ($mechanicIds as $mechanicId) {
                DB::table('mechanic_trucks')->insert([
                    'mechanic_id' => $mechanicId,
                    'truck_id' => $i,
                ]);
            }

        }



        foreach (range(1, 53) as $i) {
            $companyName = $faker->company;
            $companyName = str_replace('"', '', $companyName);
            $companyNameParts = explode(' ', $companyName);
            $companyNameWithoutFirstWord = implode(' ', array_slice($companyNameParts, 1));

            DB::table('companies')->insert([
                'name' => $companyNameWithoutFirstWord,
                'type' => $faker->companySuffix,
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Barsukas',
            'email' => 'barsukas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'animal'
        ]);

        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

    }
}
