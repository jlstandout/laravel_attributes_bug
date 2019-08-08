<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PrepareDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', 'test@example.com')->count() == 0) {
            User::create([
                'name' => 'John',
                'email' => 'test@example.com',
                'password' => Hash::make('123456'),
            ]);
        }
        if (app('rinvex.attributes.attribute')->where('slug', 'size')->count() == 0) {
            app('rinvex.attributes.attribute')->create([
                'slug' => 'size',
                'type' => 'varchar',
                'name' => 'Product Size',
                'entities' => [User::class],
            ]);
        }
        if (app('rinvex.attributes.attribute')->where('slug', 'favorite_numbers')->count() == 0) {
            app('rinvex.attributes.attribute')->create([
                'slug' => 'favorite_numbers',
                'type' => 'integer',
                'is_collection' => 1,
                'name' => 'Favorite numbers',
                'entities' => [User::class],
            ]);
        }
    }
}
