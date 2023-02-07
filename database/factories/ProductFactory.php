<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->userName,
            "price"=>random_int(100,1000),
            'thumbnail'=>$this->faker->imageUrl(),
            'depcription'=>$this->faker->realText(500),
            'qty'=>random_int(10,150),
            'status'=>$this->faker->boolean,
            'category_id'=>$this->faker->numberBetween(1,100)

        ];
    }
}
