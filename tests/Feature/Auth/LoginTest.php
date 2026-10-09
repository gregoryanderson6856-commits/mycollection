<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('login page is displayed', function () {
    $response = $this->get(route('auth/login'));

    $response->assertStatus(200);
    $response->assertSee('Login');
});

test('register page is displayed', function () {
    $response = $this->get(route('auth/register'));

    $response->assertStatus(200);
    $response->assertSee('Register');
});

test('register page displays the form', function () {
    $response = $this->actingAs($this->user)->get(route('auth/register'));

    $response->assertStatus(200);
    $response->assertViewIs('auth.register');
    $response->assertSee('Register');
});

test('user cannot login with non-existent name', function () {
    $response = $this->post(route('auth/login'), [
        'name' => 'peter',
        'password' => 'password123',
    ]);

    $response->assertSessionHasErrors(['name']);
    $this->assertGuest();
});

test('user cannot login with incorrect password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post(route('auth/login'), [
        'name' => $user->name,
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors(['name']);
    $this->assertGuest();
});

test('login validates required fields', function () {
    $response = $this->post(route('auth/login'), []);

    $response->assertSessionHasErrors(['name', 'password']);
});

test('user can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect(route('auth/login'));
    $this->assertGuest();
});

test('user can login with correct credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post(route('auth/login'), [
        'name' => $user->name,
        'password' => 'password123',
    ]);

    $response->assertRedirect(route('music/index'));
    $this->assertAuthenticatedAs($user);
});
