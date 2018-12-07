<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

if (! function_exists('is_mine')) {
    function is_mine($id)
    {
        return me()->id == $id;
    }
}

if (! function_exists('me')) {
    function me()
    {
        return Auth::user();
    }
}

if (! function_exists('where_am_i')) {
    function where_am_i($prefix = null)
    {
        info($_SERVER['HTTP_REFERER']);
    }
}
