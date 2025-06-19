<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Model\Permissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'permission',
        'entity_status_id', // Add this line
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = self::generateUniqueSlug();
        });
    }

    protected static function generateUniqueSlug($length = 10)
    {
        do {
            $slug = Str::random($length);
        } while (self::where('slug', $slug)->exists());

        return $slug;
    }

    public function permissions()
{
    return $this->hasMany(Permissions::class, 'user_group_id');
}

    
    // Define the relationship with EntityStatus
    public function entityStatus()
    {
        return $this->belongsTo(EntityStatus::class);
    }
}
