<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    // RELATIONSHIP, ONE-TO-MANY
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
