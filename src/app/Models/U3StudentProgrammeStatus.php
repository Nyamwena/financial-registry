<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class U3StudentProgrammeStatus extends Model
{
    use HasFactory;
    protected $connection = 'u3';
    protected $table = 'studentprogrammestatus';
}
