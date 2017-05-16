<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class ExampleTest extends TestCase
{
    use DatabaseTransactions; //s ovim sve sto se za vrijeme testiranja spremi u bazu, odma se i brise
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given I have two records in the database that are posts, and each one is posted a month apart.
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth() //kreiranje postova koji su minus jedan mjesec
        ]);
        // When I fetch the archives

        $posts = Post::archives();

        // Then the respnse should be in the proper format

        //$this->assertCount(2, $posts);
        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],

            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ]
        ], $posts);
    }
}
