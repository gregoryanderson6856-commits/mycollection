<?php

use App\Models\Painting;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
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

test('edit page displays the selected painting', function () {
    $painting = Painting::factory()->create([
        'name' => 'Autumn Trees',
        'sku' => 'GA26P-100',
        'size' => '10x8',
        'month' => 'October',
        'year' => '2026',
        'framed' => 'Matted',
    ]);

    $response = $this->withoutMiddleware(Authorize::class)->get(route('paintings.edit', $painting));

    $response->assertOk()
        ->assertViewIs('paintings.edit')
        ->assertSee('Autumn Trees')
        ->assertSee('GA26P-100')
        ->assertSee('October')
        ->assertSee('value="2026"', false);
});

test('edit page returns not found for a missing painting', function () {
    $response = $this->withoutMiddleware(Authorize::class)->get(route('paintings.edit', 999999));

    $response->assertNotFound();
});

test('update saves painting details and preserves the existing image', function () {
    $painting = Painting::factory()->create([
        'name' => 'Old Name',
        'sku' => 'GA26P-101',
        'size' => '10x8',
        'month' => 'January',
        'year' => '2025',
        'image_path' => 'images/paintings/existing.jpg',
        'framed' => 'Matted',
    ]);

    $response = $this->withoutMiddleware(Authorize::class)->put(route('paintings.update', $painting), [
        'name' => 'New Name',
        'sku' => 'GA26P-101',
        'size' => '12x9',
        'month' => 'February',
        'year' => '2026',
        'framed' => 'Framed',
    ]);

    $response->assertRedirect(route('paintings.index'));
    $this->assertDatabaseHas('paintings', [
        'id' => $painting->id,
        'name' => 'New Name',
        'sku' => 'GA26P-101',
        'size' => '12x9',
        'month' => 'February',
        'year' => '2026',
        'image_path' => 'images/paintings/existing.jpg',
        'framed' => 'Framed',
    ]);
});

test('update rejects a sku already used by another painting', function () {
    Painting::factory()->create(['sku' => 'GA26P-102']);
    $painting = Painting::factory()->create([
        'name' => 'Original Name',
        'sku' => 'GA26P-103',
        'size' => '10x8',
        'month' => 'January',
        'year' => '2025',
        'framed' => 'Matted',
    ]);

    $response = $this->withoutMiddleware(Authorize::class)->put(route('paintings.update', $painting), [
        'name' => 'Changed Name',
        'sku' => 'GA26P-102',
        'size' => '12x9',
        'month' => 'February',
        'year' => '2026',
        'framed' => 'Framed',
    ]);

    $response->assertSessionHasErrors('sku');
    $this->assertDatabaseHas('paintings', [
        'id' => $painting->id,
        'name' => 'Original Name',
        'sku' => 'GA26P-103',
    ]);
});
