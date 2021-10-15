<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Client;
use App\Models\User;
class ClientLoginTest extends DuskTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testClientErrorLogin()
    {
        $user = User::factory()->create();

        $website = 'http://phpunit.test';
        $this->browse(function ($first) use ($website) {
            $first->visit($website.'/')
                ->type('email', 'aa@gmail.com')
                ->type('password', 'aa')
                ->press('Login')
                ->assertPathIs('/');
        });
    }
    public function testClientLoginPost()
    {
        $website = 'http://phpunit.test';
        $this->browse(function (Browser $browser) use ($website) {
            $browser->visit($website)
            //->loginAs(Client::find(1))
            ->type('email','admin@gmail.com')
            ->type('password','11111111')
            ->press('Login')
            ->visit($website.'/client')
            ->assertSee('Client')
            ->click('.dropdown')
            ->assertSee('Logout')
            ->click('.logout')
            ->assertPathIs('/');
      });
    }
}
