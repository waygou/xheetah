<?php

namespace Waygou\Xheetah\Models\Childs;

use Tightenco\Parental\HasParentModel;
use Waygou\Xheetah\Models\User;
use Waygou\Xheetah\Traits\IsEmployeeScope;

class Employee extends User
{
    use HasParentModel;
    use IsEmployeeScope;
}
