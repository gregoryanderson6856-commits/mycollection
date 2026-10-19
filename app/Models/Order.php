<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {
    protected $fillable = ['user_id', 'order_number', 'grand_total', 'status'];

    public function items(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}