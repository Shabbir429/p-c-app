<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'u_id',
        'title',
        'date',
        'time',
    ];
    public function getTable()
    {
        return 'title_store';
    }
}
