<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
                         $browser->visit('/', [
                             'test_name' => 'testBasicExample',
                             'coverage_dir' => '/app/Http'
                         ])->assertSee('Laravel');
                     });
    }
}
