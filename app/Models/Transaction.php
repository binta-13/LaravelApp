<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'description',
        'code',
        'rate_euro',
        'date_paid',
        'category',
        'nama_transaksi',
        'nominal',
    ];
}
