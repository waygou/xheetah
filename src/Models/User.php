<?php

namespace Waygou\Xheetah\Models;

use Waygou\Surveyor\Models\Profile;
use Waygou\Helpers\Traits\CanSaveMany;
use Illuminate\Notifications\Notifiable;
use Waygou\Surveyor\Traits\UsesProfiles;
use Waygou\Surveyor\Traits\AppliesScopes;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use UsesProfiles;
    use AppliesScopes;
    use CanSaveMany;
    use UsesTenantConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function mainRole()
    {
        return $this->belongsTo(MainRole::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
