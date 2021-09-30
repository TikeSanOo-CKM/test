<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginPost(){

        $user = User::factory()->create();


        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', '1111')
                    // ->press('ログイン')
                    ->press('Login')
                    // ->waitForText('ホーム')
                    // ->assertSee('ホーム');
                    ->assertPathIs('/home');
     //   $response->press('logout');
      //  $response->seePageIs('/');
    });
}
}
