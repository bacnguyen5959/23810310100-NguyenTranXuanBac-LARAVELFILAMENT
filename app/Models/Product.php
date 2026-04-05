<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = '23810310100_products';

    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
        'price', 'stock_quantity', 'image_path', 'status', 'warranty_period',
    ];

    protected $casts = [
        'price'           => 'decimal:2',
        'stock_quantity'  => 'integer',
        'warranty_period' => 'integer',
    ];

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}