<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality',
        'license_number',
        'email',
        'phone',
        'photo',
        'address',
        'id_ihs',
        'nik'
    ];
}
