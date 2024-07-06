<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nazov',
        'hladisko',
        'adresa',
        'zaciatok',
        'pocet_radov',
        'pocet_sedadiel',
        'cena',
        'obsadene'
    ];
}
