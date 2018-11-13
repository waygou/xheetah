<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Xheetah configuration file.
    |--------------------------------------------------------------------------
    |
    | //
    */

    'security' => [
        'profiles' => [
            // Applies to users that have an overlap of permissions between 2 profiles.
            // E.g.: An user can be admin and courier at the same time, so if the
            // conflict mode is "none loses" means the permission that stays is the higher
            // permission. Like: Admin on Clients is "full" and Courier is "none",
            // so the permission that stays is "full". If the conflict mode is
            // "none wins" then the permission that stays is the 'none'.
            // Other policies will be merged:
            // A - View Any.
            // V - View.
            // C - Create.
            // U - Update.
            // D - Delete.
            // R - Restore.
            // F - Force Delete.
            // If a policy is not present in the permission, means it cannot be available.
            // E.g.: AVC means the user can ONLY do those 3 permissions.
            'conflict_mode' => 'none wins', // or 'none loses'
        ],
    ],
];
