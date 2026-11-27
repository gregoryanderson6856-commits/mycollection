<?php

use App\Models\Painting;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

test('index links each watercolor to its show page', function () {
    $watercolor = Painting::factory()->create();

    $response = $this->get(route('watercolor/index'));

    $response->assertOk()
        ->assertSee(route('watercolor/show', $watercolor))
        ->assertSee('Details');
});

test('show page displays the selected watercolor', function () {
    $watercolor = Painting::factory()->create([
        'name' => 'Evening Shore',
        'sku' => 'WC-001',
        'size' => '10x8',
        'month' => 'August',
        'year' => '2026',
        'framed' => 'Matted',
    ]);

    $response = $this->get(route('watercolor/show', $watercolor));

    $response->assertOk()
        ->assertViewIs('watercolor.show')
        ->assertSee('Evening Shore')
        ->assertSee('10x8')
        ->assertSee('August 2026')
        ->assertSee('Matted')
        ->assertSee('WC-001');
});

test('show page returns not found for a missing watercolor', function () {
    $response = $this->get(route('watercolor/show', 999999));

    $response->assertNotFound();
});
