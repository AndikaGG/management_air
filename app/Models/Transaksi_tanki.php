<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_tanki extends Model
{
    use HasFactory;
    protected $table = 'transaksi_tanki';
    protected $fillable = ['id','tgl_transaksi','harga_satuan','nama_pengantar','id_'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

}
