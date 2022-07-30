<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    // ALL MODELS ARE SET TO BE UNGUARD, TO SEE IT GO TO PROVIDERS->AppServiceProvider(boot)

    // RELATIONSHIP, ONE-TO-MANY (OFFICE & DETAILED OFFICE)
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function detailed_office()
    {
        return $this->belongsTo(DetailedOffice::class);
    }
}
