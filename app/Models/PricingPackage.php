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
        'name_en',
        'name_ar',
        'category',
        'category_en',
        'category_ar',
        'price',
        'features',
        'features_en',
        'features_ar',
        'is_featured',
        'is_active',
        'order',
        'pricing_category_id',
    ];

    protected $casts = [
        'features' => 'array',
        'features_en' => 'array',
        'features_ar' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getNameAttribute(mixed $value): mixed
    {
        return $this->getLocalizedField('name', $value);
    }

    public function pricingCategory()
    {
        return $this->belongsTo(PricingCategory::class);
    }

    public function getCategoryAttribute(mixed $value): mixed
    {
        if ($this->pricingCategory) {
            return $this->pricingCategory->name;
        }
        return $this->getLocalizedField('category', $value);
    }

    public function getFeaturesAttribute(mixed $value): mixed
    {
        // The cast has already converted JSON to array
        // Just return the original value from the cast
        return $value;
    }

    private function getLocalizedField(string $field, mixed $value): mixed
    {
        $locale = app()->getLocale();
        $localizedField = $field . '_' . $locale;
        
        if ($this->attributes[$localizedField] ?? null) {
            return $this->attributes[$localizedField];
        }
        
        return $value;
    }

    public function scopeActive(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
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
