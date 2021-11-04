<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['pending','cancelled','completed'];
        $type = ['dine-in','take-out'];
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 30),
            'status' => $status[rand(0,2)],
            'type' => $type[rand(0,1)],
        ];
    }
}
