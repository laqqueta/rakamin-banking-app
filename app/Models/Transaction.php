<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transfer';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
    ];

    public $timestamps = false;
}
