<?php

use Illuminate\Database\Seeder;
use App\Editorial;

class EditorialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editorials = [
            'La española',
            'Porrua',
            'Gandhi',
            'Alfaomega'
        ];

        foreach ($editorials as $editorial) {
            Editorial::create([
                'name' => $editorial
            ]);
        }
    }
}
