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

        $response = $this->actingAs($user)->post(route('admin.orders.store'), [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => $user->name,
            'status' => 'pending',
            'type' => 'dine-in',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/orders');

        $this->assertDatabaseHas('orders', [
            'orderNo' => 2,
            'user_id' => $user->id,
            'emp_name' => $user->name,
            'status' => 'pending',
            'type' => 'dine-in',
        ]);
    }
}
