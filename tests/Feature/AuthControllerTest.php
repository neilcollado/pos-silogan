<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_register_success()
    {
        $user = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@email.com',
            'password' => Hash::make('test123'),
        ]);

        $response = $this->post('/register', [$user]);
        
        $response->assertStatus(302);
        $response->assertRedirect('/');
        
        $this->assertDatabaseHas('users', [
            'name' => 'Test',
            'email' => 'test@email.com',
        ]);
    }

    public function test_user_register_failed()
    {
        $response = $this->post('/register', [
            'name' => 'Test',
            'password' => 'password',
        ]);
    
        $response->assertSessionHasErrors(['email']);
    
        $this->assertDatabaseMissing('users', [
            'name' => 'Test',
            'email' => 'test@email.com',
        ]);
    }

    public function test_login_cannot_access_home()
    {
        $this->withoutMiddleware();

        $user = User::factory()->create([
            'email' => 'test@email.com',
            'password' => bcrypt('test123'),
        ]);

        $response = $this->post('/login', [$user]);

        $response->assertSessionHasErrors('email');
        
        $this->assertGuest();
    }

    public function test_login_can_access_home()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/');

        $response->assertStatus(405);
    }

}
