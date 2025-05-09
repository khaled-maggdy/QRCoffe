<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory  , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function order_items () : HasMany {
        return $this->hasMany(OrderItem::class);
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function branch() : BelongsTo {
        return $this->belongsTo(Branch::class);
    }
    public function table() : BelongsTo {
        return $this->belongsTo(Table::class);
    }
}
