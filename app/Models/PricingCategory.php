<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function pricingPackages()
    {
        return $this->hasMany(PricingPackage::class);
    }

    public function scopeActive(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->orderBy('order', 'asc');
    }

    public function getNameAttribute($value)
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }
}
