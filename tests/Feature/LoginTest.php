<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Admin;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
class LoginTest extends DuskTestCase
{
    use WithoutMiddleware;
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
        //$response = $this->get('/');
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->assertSee('Admin Admin Login');
        });
      //  $response->;
      //  $response->assertViewIs('admin.auth.login');
    }

    public function testErrorLogin()
    {

        $user = User::factory()->create();


        $this->browse(function ($first) {
            $first->visit('/')
                ->type('email', 'aa@gmail.com')
                ->type('password', 'aa')
                ->press('Login')
                ->assertPathIs('/');
        });
    }
    public function testLoginPost()
    {

        $this->browse(
            function ($second) {
                $second->visit('/')
                    ->type('email','admin@gmail.com')
                    ->type('password','11111111')
                    ->press('Login')
                  //  ->loginAs(Admin::find(1))
                    ->visit('/admin')
                    ->assertSee('Laravel')
                    ->click('.send_email')
                    ->assertSee('Dashboard')
                    ->logout()
                    ->assertGuest();
                   // ->click('.dropdown')
                   // ->assertSee('Logout')
                   // ->click('.logout')
                  //  ->assertPathIs('/');
            }
        );
    }
}
