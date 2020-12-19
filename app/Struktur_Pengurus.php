<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struktur_Pengurus extends Model
{
    protected $table = 'struktur_pengurus';
    protected $fillable = [
        'tampilan_id', 'nama','jabatan','image'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
