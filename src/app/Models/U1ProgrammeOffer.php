<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class U1ProgrammeOffer extends Model
{
    use HasFactory;
    protected $connection = 'u1';
    protected $table = 'tblprogramme_definition';
}
