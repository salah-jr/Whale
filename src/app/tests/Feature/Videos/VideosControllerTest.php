<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class VideosControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    /**
     * @test
     */
    public function itListsAllPublishedVideosWithPagination(){
        Video::factory(30)->published()->create();

        $response = $this->get('/api/videos');
        $response->assertOk()
            ->assertJsonCount(20, 'data');
    }

    /**
    * @test
    */
    public function itOnlyListsVideosThatArePublished(){
        Video::factory(15)->published()->create();
        Video::factory(10)->pended()->create();

        $response = $this->get('/api/videos');
        $response->assertOk()
            ->assertJsonCount(15, 'data');
    }

    /**
     * @test
     */
    public function itGetsTheRightUser(){
        User::factory(3)->create();
        $user = User::factory()->create();

        $video = Video::factory()->for($user)->create();

        $this->assertInstanceOf(User::class, $video->user);
    }

}
