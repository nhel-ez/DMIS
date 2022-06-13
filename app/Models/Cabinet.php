<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $table = 'cabinet';

    public $timestamps = true;

    protected $fillable = [
        'CabinetId',
        'CabinetName',
        'CabinetPath'
    ];
}
