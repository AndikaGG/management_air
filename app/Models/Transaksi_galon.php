<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_galon extends Model
{
    use HasFactory;
    protected $table = 'transaksi_galon';
    protected $fillable = ['id','tgl_transaksi','harga_satuan','qty','total_harga','id_'];
}
