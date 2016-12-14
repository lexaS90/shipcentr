<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    static public function getSettings(){
        $settings = self::all();

        $res = [];

        foreach($settings as $setting) {
            $res[$setting->key] = $setting->value;
        }

        return $res;
    }

    static public function getSetting($key) {
        $setting = self::all()->where('key', $key)->first();

        return $setting->value;
    }

    static public function updateSetting($key, $value) {
        $setting = self::all()->where('key', $key)->first();

        if ( $setting){
            $setting->value = $value;
            return ($setting->save());
        }
    }

    static public function updateSettings($data) {
        foreach ($data as $k => $item) {
            self::updateSetting($k, $item);
        }
    }
}
