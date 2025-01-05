<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    /** @use SoftDeletes */
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'contact_number',
    ];
}
