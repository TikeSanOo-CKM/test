<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BetaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_eexample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
  /*  public function test_Examplee()
    {
        $response = $this->get('/beta');

        $response->assertStatus(200);

        $response->assertSee('Beta');
        $response->assertDontSee('Alpha');
    }*/
}
