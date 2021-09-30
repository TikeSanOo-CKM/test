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
    use DatabaseMigrations;
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

    public function testLoginPost()
    {

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


    /**
     * A basic browser test example.
     *
     * @return void
     */
    // public function test_basic_example()
    // {
    //     $user = User::factory()->create([
    //         'email' => 'taylor@laravel.com',
    //     ]);

    //     $this->browse(function ($browseer) use ($user) {
    //         $browseer->visit('/login')
    //                 ->type('email', $user->email)
    //                 ->type('password', 'password')
    //                 ->press('Login')
    //                 ->assertPathIs('/login');
    //     });
    // }
}
