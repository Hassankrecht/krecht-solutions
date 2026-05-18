<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }
        
        $value = $setting->value;
        $locale = app()->getLocale();
        
        // Handle bilingual structure
        if (is_array($value) && isset($value[$locale])) {
            return $value[$locale] ?? ($value['en'] ?? $default);
        }
        
        // Handle JSON string that might be bilingual
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded) && isset($decoded[$locale])) {
                return $decoded[$locale] ?? ($decoded['en'] ?? $default);
            }
        }
        
        // Return original value if not bilingual
        return $value ?? $default;
    }

    public static function set(string $key, $value, string $type = 'text')
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }

    public static function setLocalized(string $key, string $enValue, string $arValue = null, string $type = 'text')
    {
        $value = [
            'en' => $enValue,
            'ar' => $arValue,
        ];
        
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }
}
