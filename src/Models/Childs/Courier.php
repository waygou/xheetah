<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParentModel;
use Waygou\Xheetah\Traits\IsCourierScope;

class Courier extends User
{
    use HasParentModel;
    use IsCourierScope;
}
