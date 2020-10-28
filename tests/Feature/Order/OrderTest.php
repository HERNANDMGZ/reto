<?php

namespace Tests\Feature;

use App\Invoice;
use App\Order;
use App\ProductOrder;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp():void
    {
        parent::setUp();
        $this->seed();
    }

    /**@test*/
    public function testHasNotItems()
    {
       $user = factory(User::class)->create(['status'=>1]);
       $response= $this ->actingAs($user)->get(route('shops.showCart'));

        $response->assertSeeText('Aun no tienes productos agregados');
    }
    /**@test*/
    public function testGenerateOrder()
    {
        $user = factory(User::class)->create(['status'=>1]);
        $order = factory(Order::class)->create(['user_id' => $user->id]);

        factory(ProductOrder::class)->create(['order_id' => $order->id]);

        $response = $this->actingAs($user)->get(route('shops.showCart'));

        $response->assertSeeText(99999);
        $response->assertSeeText('productX');
        $response->assertSeeText(1);
    }
    /**@test*/
    public function testShowSummary()
    {
        $user = factory(User::class)->create(['status'=>1]);
        $order = factory(Order::class)->create(['user_id' => $user->id]);

        factory(ProductOrder::class)->create(['order_id' => $order->id]);

        $response = $this->actingAs($user)->get(route('shops.getCheckout', $order->id));

        $response->assertSeeText(99999);
        $response->assertSeeText('productX');
        $response->assertSeeText(1);
    }
    /**@test*/
    public function testFinishOrder()
    {
        $user = factory(User::class)->create(['status'=>1]);
        $order = factory(Order::class)->create(['user_id' => $user->id]);

        factory(ProductOrder::class)->create(['order_id' => $order->id]);

        $request = [
            'name' => 'Hernan',
            'address_payment' => 'calle 5',
            'phone' => '317551323',
            'email' => 'admin@admin.com',
        ];

        $response = $this->actingAs($user)->post(route('shops.payment', $request));
        $response->assertStatus(302);
    }

    /**@test*/
    public function testshowDetail()
    {
        $user = factory(User::class)->create(['status'=>1]);
        $order = factory(Order::class)->create(['user_id' => $user->id]);

        factory(ProductOrder::class)->create(['order_id' => $order->id]);

        $request = [
            'name' => 'Hernan',
            'address_payment' => 'calle 5',
            'phone' => '317551323',
            'email' => 'admin@admin.com',
        ];

        $this->actingAs($user)->post(route('shops.payment', $request));

        $invoices = Invoice::where('order_id', $order->id)->first();

        $response = $this->actingAs($user)->get(route('shops.payment', $invoices->reference));

        $response->assertSeeText($invoices->request_id);
        $response->assertSeeText($invoices->name);
        $response->assertSeeText($invoices->total_price);
        $response->assertSeeText($invoices->address_payment);
        $response->assertSeeText($invoices->email);
        $response->assertSeeText($invoices->phone);
        $response->assertSeeText($invoices->status);

    }
}
