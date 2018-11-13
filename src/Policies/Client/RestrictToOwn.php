<?php

namespace Waygou\Xheetah\Policies\Client;

use Waygou\Surveyor\Traits\AppliesPolicies;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\User;

class RestrictToOwn
{
    use AppliesPolicies;

    public function view(User $user, Client $client)
    {
        return $user->client->id == $client->id;
    }

    public function update(User $user, Client $client)
    {
        return $user->client->id == $client->id;
    }

    public function delete(User $user, Client $client)
    {
        return $user->client->id == $client->id;
    }
}
