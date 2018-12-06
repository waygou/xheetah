<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParentModel;
use Waygou\Xheetah\Traits\IsClientUserScope;

class ClientUser extends User
{
    use HasParentModel;
    use IsClientUserScope;
}
