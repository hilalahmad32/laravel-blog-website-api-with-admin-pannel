<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'footer_desc',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'youtube',
        'about_title',
        'about_desc',
    ];
}
