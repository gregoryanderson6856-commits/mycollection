<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

pest()->use(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('creates a user with fake data', function () {
    $user = User::factory()->create([
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => Str::random(8),
    ]);
    expect($user->name)->not->toBeEmpty();
});

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('create page displays the form', function () {
    $response = $this->actingAs($this->user)->get(route('albums.create'));

    $response->assertStatus(200);
    $response->assertViewIs('albums.create');
    $response->assertSee('Create Album');
});
