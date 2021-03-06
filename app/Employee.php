<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
}
