<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'alamat'=>'Medan',
                'user_id' =>1,
                'no_telpon' =>'080088008',
                'foto' =>'-',
                'jenisKelamin' =>'Laki-Laki',   
        ];
    }
}
