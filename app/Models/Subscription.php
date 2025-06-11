<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Subscription extends Model
{
     use HasFactory;

    protected $fillable = [
    'user_id', 'plan_name', 'start_date', 'end_date', 'renewal_date',
    'auto_renew', 'invoice_path', 'status'
];

}
