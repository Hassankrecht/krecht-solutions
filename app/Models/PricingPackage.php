<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
    use HasFactory;

    public const CATEGORY_WEB = 'Web Solutions';
    public const CATEGORY_MOBILE = 'Mobile Applications';
    public const CATEGORY_POS = 'POS & Business Systems';
    public const CATEGORY_SUPPORT = 'Support & Maintenance';

    protected $fillable = [
        'name',
        'category',
        'price',
        'features',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public static function categories(): array
    {
        return [
            self::CATEGORY_WEB,
            self::CATEGORY_MOBILE,
            self::CATEGORY_POS,
            self::CATEGORY_SUPPORT,
        ];
    }
}
