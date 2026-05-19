<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'title_ar',
        'description',
        'description_en',
        'description_ar',
        'image',
        'gallery_images',
        'video',
        'technologies',
        'technologies_en',
        'technologies_ar',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active'      => 'boolean',
        'gallery_images' => 'array',
        'technologies' => 'array',
        'technologies_en' => 'array',
        'technologies_ar' => 'array',
    ];

    public function getTitleAttribute($value)
    {
        return $this->getLocalizedField('title', $value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getLocalizedField('description', $value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->getLocalizedField('category', $value);
    }

    public function getTechnologiesAttribute($value)
    {
        $locale = app()->getLocale();
        $localizedField = 'technologies_' . $locale;
        
        if ($this->attributes[$localizedField] ?? null) {
            return $this->attributes[$localizedField];
        }
        
        return $value;
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
        return $query->orderBy('order', 'asc');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ProjectCategory::class, 'project_category_project');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
