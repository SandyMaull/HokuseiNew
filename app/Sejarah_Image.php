<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sejarah_Image extends Model
{
    protected $table = 'sejarah_image';
    protected $fillable = [
        'tampilan_id', 'image', 'bagian','resize'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
