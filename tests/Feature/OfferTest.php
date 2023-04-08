<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Models\User;

beforeEach(function(){
    $this->admin = User::factory()->create()->addRole('administrator');
    $this->user = User::factory()->create()->addRole('user');
});


test('unauthentication user cannot show page manage offers', function () {
    $response = $this->get('/offer/index')
    ->assertRedirect('/login');
});

test('authentication user and not admin cannot show page manage products redirect to page home', function () {

    $this->actingAs($this->user)
        ->get('/offer/index')
        ->assertRedirect('/');
});

test('authentication admin can show page manage offers', function () {
    
    $this->actingAs($this->admin)
        ->get('/offer/index')
        ->assertStatus(200);
});

test('authentication admin can visit page create offer', function () {
    
    $response=$this->actingAs($this->admin)
        ->get('offer/create');
    $response->assertSee('describe')
        ->assertSee('type Discount')
        ->assertSee('discount')
        ->assertSee('product discount')
        ->assertSee('when buy product')
        ;
});

test('authentication user can not visit page create offer', function () {
    
    $response=$this->actingAs($this->user)
        ->get('offer/create');
    $response->assertStatus(302);
});

test('authentication admin can store offer', function () {
    
    $this->withoutMiddleware();
    $response=$this->actingAs($this->admin)
        ->post('/offer/store',[
            'offer_type'=>'product',
            'describe'=>'describe',
            'discount_type'=>'fixed',
            'discount'=>'10',
            'offer'=>1,
            'product_id'=>'1'
        ])
        ->assertStatus(302)
        ->assertRedirect('offer/index');
        $this->assertDatabaseHas('offers',[
            'offer_type'=>'product',
            'offer'=>'1',
            'product_id'=>1
    ]);
});


test('authentication admin cannot store offer becouase valids missing', function () {
    $this->withoutMiddleware();
    $this->actingAs($this->admin)
        ->post('/offer/store',[
            'discount_type'=>'fixed',
            'discount'=>'10',
            'offer'=>'1',
        ])
        ->assertSessionHasErrors(['offer_type','describe']);
});



