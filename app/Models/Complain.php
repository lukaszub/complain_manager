<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = ['adress', 
                           'date_of_absence_collection',
                           'contact_number',
                           'fraction',
                           'note',
                           'date_of_collection',
                           'truck_number',
                           'status',
                           'file',
                           'office_worker',
                           'driver_name'
    ];

    //default value for status 
    protected $attributes = [
        'status' => 'brak'
    ];


}
