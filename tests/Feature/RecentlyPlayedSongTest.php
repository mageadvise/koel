<?php

namespace Tests\Feature;

use App\Models\Interaction;
use Tests\TestCase;

use function Tests\create_user;

class RecentlyPlayedSongTest extends TestCase
{
    public function testIndex(): void
    {
        $user = create_user();

        Interaction::factory(5)->for($user)->create();

        $this->getAs('api/songs/recently-played', $user)
            ->assertJsonStructure(['*' => SongTest::JSON_STRUCTURE]);
    }
}
