<?php

namespace Database\Seeders;

use App\Models\PhoneBook;
use App\Models\UserCountry;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(50)->create()
            ->each(function ($user) {
                $phone = new PhoneBook();
                $phone->number = fake()->phoneNumber();
                $country = new UserCountry();
                $country->name = fake()->country();
                $user->phone()->save($phone);
                $user->country()->save($country);
            });
    }
}
