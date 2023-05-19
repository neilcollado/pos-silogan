<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_update_credentials()
    {
        $user = User::factory()->create([
            'name' => 'temp',
            'email' => 'temp@email.com',
        ]);
        
        $response = $this->actingAs($user)->put(route('admin.users.update', $user->id), [
            'name' => 'temp_update',
            'email' => 'temp_update@email.com',
        ]);
    
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'temp_update',
            'email' => 'temp_update@email.com',
        ]);
    }

}
