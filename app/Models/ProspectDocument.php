<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectDocument extends Model
{
    use HasFactory;

    protected $guarated = [];

    protected $fillable = [
        'prospect_id',
        'activity_id',
        'path',
        'notes'
    ];
}
