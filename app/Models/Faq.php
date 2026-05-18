<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'question_en',
        'question_ar',
        'answer',
        'answer_en',
        'answer_ar',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getQuestionAttribute($value)
    {
        return $this->getLocalizedField('question', $value);
    }

    public function getAnswerAttribute($value)
    {
        return $this->getLocalizedField('answer', $value);
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
}
