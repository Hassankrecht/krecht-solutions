<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'name',
        'position',
        'position_en',
        'position_ar',
        'company',
        'company_en',
        'company_ar',
        'email',
        'content',
        'content_en',
        'content_ar',
        'rating',
        'image',
        'status',
        'is_active',
        'order',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'integer',
    ];

    public function getPositionAttribute($value)
    {
        return $this->getLocalizedField('position', $value);
    }

    public function getCompanyAttribute($value)
    {
        return $this->getLocalizedField('company', $value);
    }

    public function getContentAttribute($value)
    {
        return $this->getLocalizedField('content', $value);
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

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('order', 'asc');
    }

    public function approve(): void
    {
        $this->update([
            'status' => self::STATUS_APPROVED,
            'is_active' => true,
        ]);
    }

    public function reject(): void
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
            'is_active' => false,
        ]);
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }
}
