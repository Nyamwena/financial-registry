<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceResponsibility extends Model
{
    use HasFactory;

    protected $table = 'tbl_responsible_service';

    protected $fillable = [
      'fl_centre_code', 'fl_service_code','fl_period_code'
    ];

    public function service_name(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Services::class,'fl_service_code','fl_service_code');
    }
    public function account_periods(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountPeriod::class,'fl_period_code','fl_period_code');
    }

    public function centre_name(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Responsibility::class,'fl_centre_code','fl_centre_code');
    }
}
