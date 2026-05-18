<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'title_ar',
        'short_description',
        'short_description_en',
        'short_description_ar',
        'description',
        'description_en',
        'description_ar',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getTitleAttribute($value)
    {
        return $this->getLocalizedField('title', $value);
    }

    public function getShortDescriptionAttribute($value)
    {
        return $this->getLocalizedField('short_description', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getLocalizedField('description', $value);
    }

    private function getLocalizedField($field, $value)
    {
        $locale = app()->getLocale();
        $localizedField = $field . '_' . $locale;
        
        if ($this->attributes[$localizedField] ?? null) {
            return $this->attributes[$localizedField];
        }
        
        return $value;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
