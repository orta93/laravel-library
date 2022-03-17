<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'Gabriel',
                'last_name' => 'Garcia Marquez'
            ],
            [
                'name' => 'Miguel',
                'last_name' => 'De Cervantes Savedra'
            ],
            [
                'name' => 'Ana',
                'last_name' => 'Poliatovska'
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
