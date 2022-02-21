<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class U2IntakeType extends Model
{
    use HasFactory;
    protected $connection = 'u2';
    protected $table ='intake_type';
}
