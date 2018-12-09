<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParent;
use Waygou\Xheetah\Traits\IsClientUserScope;

class ClientUser extends User
{
    use HasParent;
    use IsClientUserScope;
}
