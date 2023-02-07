<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */    public function definition()
    {
        return [
            'price'=>$this->faker->randomDigitNotNull,
            'qty'=>$this->faker->numberBetween(50,500),
            'oder_id'=>$this->faker->numberBetween(1,1000),
            'product_id'=>$this->faker->numberBetween(1,1000)
        ];
    }
}
