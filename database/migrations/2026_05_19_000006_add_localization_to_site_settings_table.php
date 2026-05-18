<?php

use App\Models\SiteSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Migrate existing data to new bilingual structure
        $settings = DB::table('site_settings')->get();
        
        foreach ($settings as $setting) {
            $currentValue = $setting->value;
            $newValue = [];
            
            // If value is already JSON (like social_links), keep it as is
            if (is_string($currentValue) && json_decode($currentValue) !== null) {
                $decoded = json_decode($currentValue, true);
                if (isset($decoded['en']) || isset($decoded['ar'])) {
                    // Already has language structure, skip
                    continue;
                }
                // For non-textual JSON like social_links, keep as is
                if ($setting->key === 'social_links') {
                    continue;
                }
            }
            
            // Convert to bilingual structure
            if (is_string($currentValue)) {
                $newValue = [
                    'en' => $currentValue,
                    'ar' => null,
                ];
            } elseif (is_array($currentValue)) {
                // Keep array structure as is for non-textual data
                continue;
            }
            
            DB::table('site_settings')
                ->where('id', $setting->id)
                ->update(['value' => json_encode($newValue)]);
        }
    }

    public function down(): void
    {
        // Revert to single-language structure
        $settings = DB::table('site_settings')->get();
        
        foreach ($settings as $setting) {
            $currentValue = $setting->value;
            
            if (is_string($currentValue)) {
                $decoded = json_decode($currentValue, true);
                
                if (is_array($decoded) && isset($decoded['en'])) {
                    // Revert to English value only
                    DB::table('site_settings')
                        ->where('id', $setting->id)
                        ->update(['value' => $decoded['en']]);
                }
            }
        }
    }
};
