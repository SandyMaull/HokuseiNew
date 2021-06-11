<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header_Image extends Model
{
    protected $table = 'header_image';
    protected $fillable = [
        'tampilan_id', 'image', 'bagian','resize'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
