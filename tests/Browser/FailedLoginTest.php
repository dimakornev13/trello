<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FailedLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_failed_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor('#email')
                ->type('#email', $this->user->email)
                ->type('#password', 'wrong password')
                ->press('login')
                ->pause(3000)
                ->assertPathBeginsWith('/');
        });
    }
}
