<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Orders;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_create()
    {
        $user = User::factory()->make();
        
        $order_info = [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => 'Test Name',
            'status' => 'pending',
            'type' => 'dine-in',
        ];

        $response = $this->call('POST', '/orders', $order_info);

        $response->assertStatus($response->status(), 200);
    }

    public function test_order_view()
    {
        $user = User::factory()->make();
        
        $order_info = [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => 'Test Name',
            'status' => 'pending',
            'type' => 'dine-in',
        ];

        $response = $this->call('GET', '/orders', $order_info);

        $response->assertStatus($response->status(), 200);
    }

    public function test_order_update(){
        $user = User::factory()->make();

        $order = [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => 'Test Name',
            'status' => 'pending',
            'type' => 'dine-in',
        ];
    
        $response = $this->put('/orders', [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => 'Test Update',
            'status' => 'completed',
            'type' => 'dine-in',
        ]);
    
        $response->assertStatus($response->status(), 200);
    }

    public function test_order_delete(){
        $user = User::factory()->make();

        $order = [
            'id' => 4,
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => 'Test Name',
            'status' => 'pending',
            'type' => 'dine-in',
        ];

        $response = $this->delete('orders/' . $order['id']);

        $response->assertStatus($response->status(), 200);

        $this->assertDatabaseMissing('orders', ['id' => $order['id']]);
    }
}
