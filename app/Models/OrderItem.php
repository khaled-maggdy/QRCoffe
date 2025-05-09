<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory  , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }
    public function product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
