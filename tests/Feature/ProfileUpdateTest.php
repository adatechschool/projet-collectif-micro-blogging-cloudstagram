<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_profile_page_is_dislayed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');
        $response->assertOk();
    }

    public function test_bio_can_be_updated(): void
    {
        $user= User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', ['biography' => 'Voici ma biographie']);
        
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');
        
        $user->refresh();

        $this->assertSame('Voici ma biographie', $user->biography);
    
    }


}
