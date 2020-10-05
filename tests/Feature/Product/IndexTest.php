<?php

namespace Tests\Feature\Product;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp():void
    {
        parent::setUp();
        $this->seed();
    }
    /**@test*/

    public function testExample()
    {

        $this->withoutExceptionHandling();


        $user = factory(User::class)->create(['status'=>1]);


        $response = $this->actingAs($user)->get(route('products.index'));


        $response->assertStatus(200);

    }
}
