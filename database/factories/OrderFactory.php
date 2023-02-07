<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'oder_date'=>$this->faker->date,
            'grand_total'=>$this->faker->randomFloat(12,10000.00,10000000.00),
            'shipping_address'=>$this->faker->address,
            'customer_tel'=>$this->faker->phoneNumber,
            'status'=>$this->faker->boolean
        ];
    }
}
