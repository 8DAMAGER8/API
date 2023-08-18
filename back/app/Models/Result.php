<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'table&id',
        'title',
        'income',
        'date'
    ];
}
