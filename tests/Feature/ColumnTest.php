<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ColumnTest extends TestCase
{


    use DatabaseMigrations;

    private $user;


    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->seed();

        $this->user = User::find(2);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {
        //$response = $this->actingAs($this->user, 'api')
        //    ->post
    }
}
