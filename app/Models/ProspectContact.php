<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectContact extends Model
{
    use HasFactory;

    protected $guarated = [];

    protected $fillable = [
        'prospect_id',
        'phone',
        'phone_mobile',
        'fax',
        'address',
        'address_2',
        'city',
        'unit',
        'province',
        'postal_code',
        'country',
        'notes',
    ];


}
