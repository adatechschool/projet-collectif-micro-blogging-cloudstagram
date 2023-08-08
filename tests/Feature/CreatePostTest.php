<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\Type\VoidType;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     * A basic feature test example.
     */
    public function test_create_post_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/create_post');
        $response->assertOk();
    }

    public function test_post_is_created(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/create_post', [
                'title' => 'un titre',
                'content' => 'un contenu'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/feed');
    }

    public function test_db_has_posts(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/create_post', [
                'title' => 'un titre',
                'content' => 'un contenu'
            ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'un titre',
            'content' => 'un contenu'
        ]);
    }

    // public function test_posts_are_displayed(): void 
    // {
    //     $user = User::factory()->create();
    //     $post = Post::factory()->create([
    //         'user_id' => $user->id
    //     ]);

    //     $view = $this->blade(
    //         '<div class="flex ml-10 p-6 w-96 opacity-30 hover:opacity-100 transition ease-in-out delay-100">
    //         <div class="flex flex-col">    
    //             <h3 class=" text-xl font-bold text-red-400 mb-1">.ೃ࿐ {{ $post['title'] }}</h3>
    //             <p class=" mb-3">“ {{ $post['content'] }} „</p>
    //             <p class=" text-sm italic">published by {{ $post['author'] }} on {{ $post['date'] }}</p>
    //     </div>
    //     </div>',
    //         ['post' => $post]
    //     );

    //     $view->assertSee('titre', true);
        
    // }
}
