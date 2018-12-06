<?php

namespace Waygou\Xheetah\Models\Childs;

use Waygou\Xheetah\Models\User;
use Tightenco\Parental\HasParentModel;
use Waygou\Xheetah\Traits\IsEmployeeScope;

class Employee extends User
{
    use HasParentModel;
    use IsEmployeeScope;
}
