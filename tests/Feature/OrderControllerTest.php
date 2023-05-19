<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_create()
    {
        $user = User::factory()->create();
        
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
        $user = User::factory()->create();
        
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
}
