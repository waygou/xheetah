<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParent;
use Waygou\Xheetah\Traits\IsCourierScope;

class Courier extends User
{
    use HasParent;
    use IsCourierScope;
}
