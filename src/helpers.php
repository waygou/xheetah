<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('is_mine')) {
    function is_mine($id)
    {
        return me()->id == $id;
    }
}

if (!function_exists('me')) {
    function me()
    {
        return Auth::user();
    }
}

if (!function_exists('seed_rand_id')) {
    function seed_rand_id($table, $column = 'id')
    {
        $ids = DB::table($table)
                 ->selectRaw("min(`{$column}`) min_id, max(`{$column}`) max_id")
                 ->get()->toArray();

        if ($ids[0]->min_id == null) {
            return;
        }

        return rand($ids[0]->min_id, $ids[0]->max_id);
    }
}

if (!function_exists('seed_rand_id_from_nulls')) {
    function seed_rand_id_from_nulls($table, $column)
    {
        $ids = DB::table($table)
                 ->selectRaw("min(`{$column}`) min_id, max(`{$column}`) max_id")
                 ->whereNull($column)
                 ->get()->toArray();

        if ($ids[0]->min_id == null) {
            return;
        }

        return rand($ids[0]->min_id, $ids[0]->max_id);
    }
}

if (!function_exists('where_am_i')) {
    function where_am_i($prefix = null)
    {
        info($_SERVER['HTTP_REFERER']);
    }
}
