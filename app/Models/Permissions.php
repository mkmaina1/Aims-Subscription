<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'permission_group'];

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

       public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

}
