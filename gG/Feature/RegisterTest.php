<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
class RegisterTest extends DuskTestCase
{
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
}
