<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_jerigen extends Model
{
    use HasFactory;
    protected $table = 'transaksi_jerigen';
    protected $fillable = ['id','tgl_transaksi','harga_satuan','qty','total_harga','id_'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

}