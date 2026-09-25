<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class Settings
{
    protected const CACHE_KEY = 'settings.all';

    public static function all(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return Setting::query()->pluck('value', 'key')
                ->map(fn ($value) => is_array($value) ? ($value['v'] ?? null) : $value)
                ->toArray();
        });
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return data_get(self::all(), $key, $default);
    }

    public static function put(string $group, string $key, mixed $value): void
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['group' => $group, 'value' => ['v' => $value]]
        );

        Cache::forget(self::CACHE_KEY);
    }
}
