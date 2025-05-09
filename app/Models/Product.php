<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function order_items() : HasMany {
        return $this->hasMany(OrderItem::class);
    }
    public function branch_products() : HasMany {
        return $this->hasMany(BranchProduct::class);
    }
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

}
