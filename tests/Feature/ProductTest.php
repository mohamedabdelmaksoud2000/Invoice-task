<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Models\User;
use App\Models\Shipping;

beforeEach(function(){
    $this->admin = User::factory()->create()->addRole('administrator');
    $this->user = User::factory()->create()->addRole('user');
    $this->shipping = Shipping::where('country','US')->first();
});


test('unauthentication user cannot show page manage products redirect to page login', function () {
    $response = $this->get('/dashboard')
    ->assertRedirect('/login');
});

test('authentication user and not admin cannot show page manage products redirect to page home', function () {

    $this->actingAs($this->user)
        ->get('/dashboard')
        ->assertRedirect('/');
});

test('authentication admin can show page manage products', function () {
    
    $this->actingAs($this->admin)
        ->get('/dashboard')
        ->assertStatus(200);
});

test('authentication admin can visit page create product', function () {
    
    $response=$this->actingAs($this->admin)
        ->get('product/create');
    $response->assertSee('Item type')
        ->assertSee('Shipping From')
        ->assertSee('Item price')
        ->assertSee('Weight');
});

test('authentication admin can visit page update product', function () {
    
    $response=$this->actingAs($this->admin)
        ->get('product/1/edit');
    $response->assertSee('Item type')
        ->assertSee('Shipping From')
        ->assertSee('Item price')
        ->assertSee('Weight');
});

test('authentication user can not visit page create product', function () {
    
    $response=$this->actingAs($this->user)
        ->get('product/create');
    $response->assertStatus(302);
});

test('authentication user can not visit page update product', function () {
    
    $response=$this->actingAs($this->user)
        ->get('product/1/edit');
    $response->assertStatus(302);
});

test('authentication admin can store product', function () {
    
    $this->withoutMiddleware();
    $response=$this->actingAs($this->admin)
        ->post('/product/store',[
            'type'=>'jeans',
            'shipping_id'=>$this->shipping->id,
            'price'=>'40',
            'weight'=>'.8',
        ])
        ->assertStatus(302)
        ->assertRedirect('dashboard');
        $this->assertDatabaseHas('products',[
        'type'=>'jeans'
    ]);
});


test('authentication admin cannot store product becouase valid missing', function () {
    $this->withoutMiddleware();
    $this->actingAs($this->admin)
        ->post('/product/store',[
            'type'=>'jeans2',
            'price'=>'60',
            'weight'=>'.8',
        ])
        ->assertSessionHasErrors(['shipping_id']);
});

test('authentication admin cannot store product becouase type unique', function () {
    $this->withoutMiddleware();
    $this->actingAs($this->admin)
        ->post('/product/store',[
            'type'=>'jeans',
            'price'=>'60',
            'shipping_id'=>$this->shipping->id,
            'weight'=>'.8',
        ])
        ->assertSessionHasErrors(['type']);
});


