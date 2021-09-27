<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
class LoginTest extends DuskTestCase
{
    /*use DatabaseMigrations;
    */
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use WithoutMiddleware;
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testErrorLogin()
    {

        $user = User::factory()->create();


        $this->browse(function ($first) {
            $first->visit('/login')
                ->type('email', 'aa@gmail.com')
                ->type('password', 'aa')
                ->press('Login')
                ->assertPathIs('/login');
        });
    }
    public function testLoginPost()
    {
        $this->browse(
            function ($second) {
                $second->visit('/login')
                    ->loginAs(User::find(1))
                    ->visit('/home')
                    ->assertSee('Dashboard')
                    ->click('.dropdown')
                    ->assertSee('Logout')
                    ->click('.logout')
                    ->assertPathIs('/');
            }
        );
    }
}
