<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proscons extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        't_id',
        'argument',
        'importance',
        'proscons',
    ];
    public function getTable()
    {
        return 'proscons';
    }
}
