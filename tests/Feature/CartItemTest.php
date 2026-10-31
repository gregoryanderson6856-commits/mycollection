<?php

use App\Models\Album;
use App\Models\CartItem;
use App\Models\Comicbook;
use App\Models\Painting;
use App\Models\Tabletalk;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

beforeEach(function () {
    // Create a test user
    $this->user = User::factory()->create();
});

it('can create a cart item for a user', function () {
    $cartItem = CartItem::factory()->create([
        'user_id' => $this->user->id,
        'itemable_id' => 234,
        'itemable_type' => Album::class,
        'quantity' => 1,
        'price_at_addition' => 3.45,
    ]);

    expect($cartItem)->toBeInstanceOf(CartItem::class);
    expect($cartItem->user_id)->toBe($this->user->id);
    expect($cartItem->quantity)->toBe(1);
    expect($cartItem->price_at_addition)->toBe(3.45);

    $this->assertDatabaseHas('cart_items', [
        'id' => $cartItem->id,
        'user_id' => $this->user->id,
        'itemable_type' => Album::class,
    ]);
});

it('resolves the linked itemable model', function () {
    $painting = Painting::factory()->create();

    $cartItem = CartItem::factory()->create([
        'user_id' => $this->user->id,
        'itemable_id' => $painting->id,
        'itemable_type' => Painting::class,
        'quantity' => 2,
    ]);

    expect($cartItem->itemable)->toBeInstanceOf(Painting::class);
    expect($cartItem->itemable->id)->toBe($painting->id);
});

it('returns the correct type label for each itemable type', function () {
    $cases = [
        Painting::class => 'Painting',
        Tabletalk::class => 'Table Talk',
        Album::class => 'Album',
        Comicbook::class => 'Comic Book',
        'Something\Else' => 'Product',
    ];

    foreach ($cases as $itemableType => $expectedLabel) {
        $cartItem = CartItem::factory()->make([
            'itemable_type' => $itemableType,
        ]);

        expect($cartItem->type_label)->toBe($expectedLabel);
    }
});

it('can update the cart item quantity', function () {
    $cartItem = CartItem::factory()->create([
        'user_id' => $this->user->id,
        'quantity' => 1,
    ]);

    $cartItem->quantity = 5;
    $cartItem->save();

    expect($cartItem->fresh()->quantity)->toBe(5);
});
