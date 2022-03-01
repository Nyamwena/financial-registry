<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class U3StudentMember extends Model
{
    use HasFactory;

    protected $connection = 'u3';

    protected $table = 'studentmember';

    public function customer(){
        $customer = U3StudentMember::on('mysql')
            ->join('tbl_consumer','studentmember.studentNumber','=','tbl_consumer.fl_consumer_account');
       // ->where();

        return $customer;
    }

}
