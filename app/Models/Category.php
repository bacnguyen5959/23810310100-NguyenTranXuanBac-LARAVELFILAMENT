<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = '23810310100_categories';

    protected $fillable = ['name', 'slug', 'description', 'is_visible'];

    protected $casts = ['is_visible' => 'boolean'];

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}