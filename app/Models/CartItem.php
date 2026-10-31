<?php

// app/Models/CartItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $itemable_type
 * @property int $itemable_id
 * @property int $quantity
 * @property numeric $price_at_addition
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $type_label
 * @property-read Model|\Eloquent $itemable
 * @method static \Database\Factories\CartItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereItemableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereItemableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem wherePriceAtAddition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUserId($value)
 * @mixin \Eloquent
 */
class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'itemable_id', 'itemable_type', 'quantity', 'price_at_addition'];

    // Resolves the exact linked instance object dynamically
    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }

    // Clean label extractor for the Blade interface layout
    public function getTypeLabelAttribute(): string
    {
        return match ($this->itemable_type) {
            Album::class => 'Album',
            Painting::class => 'Painting',
            Comicbook::class => 'Comic Book',
            Tabletalk::class => 'Table Talk',
            default => 'Product',
        };
    }
}
