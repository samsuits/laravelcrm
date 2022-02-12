<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProspectActivity extends Model
{
    use HasFactory;

    protected $guarated = [];

    protected $fillable = [
        'prospect_id',
        'communication_type',
        'type',
        'notes',
    ];

    public function scopeProspectId($query, $id)
    {
        return $query->where('prospect_id', $id);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(\App\Models\ProspectDocument::class, 'activity_id', 'id');
    }

}
