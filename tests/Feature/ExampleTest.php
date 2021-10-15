<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
class ExampleTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function GetIndex()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/', [
                'test_name' => 'testBasicExample',

            ])->assertSee('Laravel');
        });
    }
    public function testInndex(){
        dd(env('APP_URL'));
    }
}
