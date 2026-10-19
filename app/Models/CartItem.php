<?php
// app/Models/CartItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CartItem extends Model {
    protected $fillable = ['user_id', 'itemable_id', 'itemable_type', 'quantity', 'price_at_addition'];

    // Resolves the exact linked instance object dynamically
    public function itemable(): MorphTo {
        return $this->morphTo();
    }

    // Clean label extractor for the Blade interface layout
    public function getTypeLabelAttribute(): string {
        return match($this->itemable_type) {
            \App\Models\Album::class      => 'Album',
            \App\Models\Painting::class   => 'Painting',
            \App\Models\Comicbook::class  => 'Comic Book',
            \App\Models\Tabletalk::class  => 'Table Talk',
            default                       => 'Product',
        };
    }
}