<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_subscribers()
    {
        $response = $this->get('/subscribers');

        $response->assertStatus(200);
    }

    public function test_key()
    {
        $response = $this->get('/key');

        $response->assertStatus(200);
    }

    public function test_subscriberData()
    {
        $response = $this->get('/subscribers/getSubscribersData');

        $response->assertStatus(200);
    }

}
