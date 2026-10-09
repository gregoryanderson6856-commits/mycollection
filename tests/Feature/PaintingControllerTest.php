<?php

use App\Models\Painting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

pest()->use(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('index page displays a list of paintings', function () {
    $paintings = Painting::factory()->count(3)->create();

    $response = $this->actingAs($this->user)->get(route('paintings.index'));

    $response->assertStatus(200);
    $response->assertViewIs('paintings.index');

    foreach ($paintings as $painting) {
        $response->assertSee($painting->name);
    }
});

test('index page shows empty state when no paintings exist', function () {
    $response = $this->actingAs($this->user)->get(route('paintings.index'));

    $response->assertStatus(200);
    $response->assertSee('No Painting Found!');
});

test('create page displays the form', function () {
    $response = $this->actingAs($this->user)->get(route('paintings.create'));

    $response->assertStatus(200);
    $response->assertViewIs('paintings.create');
    $response->assertSee('Add New Painting');
});
/*
test('store validates required fields', function () {
    $response = $this->actingAs($this->user)->post(route('paintings.store'),[]);

    $response->assertSessionHasErrors(['name', 'sku', 'size', 'month', 'year', 'image_path']);
});
*/
test('store validates title max length', function () {
    $response = $this->actingAs($this->user)->post(route('paintings.store'), [
        'name' => str_repeat('a', 256),
        'sku' => 'GA24P-012',
        'size' => '10x8',
        'month' => 'January',
        'year' => '2025',
        'image_path' => '215487.jpg',
    ]);

    $response->assertSessionHasErrors(['name']);
});

test('store validates sku not empty', function () {
    $response = $this->actingAs($this->user)->post(route('paintings.store'), [
        'name' => 'Birch',
        'sku' => '',
        'size' => '10x8',
        'month' => 'January',
        'year' => '2025',
        'image_path' => '215487.jpg',
    ]);

    $response->assertSessionHasErrors(['sku']);
});

/**
 * Test that duplicate sku entries are rejected.
 */
it('rejects duplicate sku entries', function () {
    // Arrange: Create an sku with a unique sku
    $sku = 'GA24P-012';
    Painting::factory()->create(['sku' => $sku]);

    // Act: Attempt to create another sku with the same sku via HTTP request
    $response = $this->post('/paintings', [
        'name' => 'Another painting',
        'sku' => $sku,
        'size' => '10x8',
        'month' => 'January',
        'year' => '2025',
        'image_path' => '215487.jpg',
    ]);

    // Assert: The response should contain validation errors for 'sku'
    $response->assertStatus(302); // Redirect back due to validation failure
    $response->assertSessionHasErrors(['sku']);

    // Assert: Only one sku exists in the database with that sku
    expect(Painting::where('sku', $sku)->count())->toBe(1);
});
