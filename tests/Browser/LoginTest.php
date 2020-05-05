<?php

namespace Tests\Browser;

use App\Services\DashboardService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function test_successful_login()
    {
        $dashboards = DashboardService::getUserDashboards($this->user);

        $this->browse(function (Browser $browser) use ($dashboards){
            $browser->visit('/')
                ->waitFor('#email')
                ->type('#email', $this->user->email)
                ->type('#password', 'test')
                ->press('login')
                ->waitUntilMissingText('login')
                ->assertPathIs('/dashboards')
                ->waitFor('.board-tile');

            $dashboards->each(function ($dashboard) use (&$browser){
                $browser->assertSee($dashboard->title);
            });
        });
    }

}
