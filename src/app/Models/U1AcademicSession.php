<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class U1AcademicSession extends Model
{
    use HasFactory;
    protected $connection = 'u1';
    protected $table = 'academic_session';
}
