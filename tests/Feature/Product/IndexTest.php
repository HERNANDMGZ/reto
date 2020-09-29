<?php

namespace Tests\Feature\Product;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**@test*/
    public function testExample()
    {

        $this->withoutExceptionHandling();


        $user = factory(User::class, 1)->create(['email_verified_at'=>null]);


        $response = $this->actingAs($user)->get(route('products'));
        dd($response);

        $response->assertRedirect('login');

    }
}
