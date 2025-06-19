<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define relationships if needed
    public function permissions()
    {
        return $this->hasMany(Permissions::class);
    }
}
