<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParent;
use Waygou\Xheetah\Traits\IsEmployeeScope;

class Employee extends User
{
    use HasParent;
    use IsEmployeeScope;
}
