<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\User;
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
        $uid = $this->faker->numberBetween($min = 1, $max = 30);
        $employee = User::findOrFail($uid); 
        static $orderNo = 1;
        if($orderNo > 15) {
            $orderNo = 1;
        }
        return [
            'user_id' => $uid,
            'orderNo' => $orderNo++,
            'emp_name' => $employee->name,
            'status' => $status[rand(0,2)],
            'type' => $type[rand(0,1)],
        ];
    }
}
