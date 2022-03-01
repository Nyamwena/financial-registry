<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryService extends Model
{
    use HasFactory;

    protected $table = 'tbl_inventory_service';

    protected $fillable = ['fl_service_description',
        'fl_location_code','fl_on_hand','fl_on_order','fl_unit_cost','fl_retail_price','fl_service_dest'];
}
