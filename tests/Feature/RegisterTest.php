<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class RegisterTest extends DuskTestCase
{
  /*  use DatabaseMigrations;*/

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_register_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Laravel');
        });
    }

    public function test_user_register(){

        $this->browse(function (Browser $browser) {
           // $user = User::factory();
            $browser->visit('/register')
                    ->type('name','aad')
                    ->type('password',12121212)
                    ->type('email','aa@gmail.com')
                    ->type('password_confirmation',12121212)
                    ->press('Register')
                    ->assertSee('Dashboard');
        });
    }

}
