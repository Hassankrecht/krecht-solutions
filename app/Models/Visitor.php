<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'visit_date',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    /**
     * Get total unique visitors count
     */
    public static function getTotalVisitors(): int
    {
        return self::distinct()->count('session_id');
    }

    /**
     * Get today's unique visitors count
     */
    public static function getTodayVisitors(): int
    {
        return self::where('visit_date', today())->distinct()->count('session_id');
    }
}
