<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tampilan extends Model
{
    protected $table = 'tampilan';
    protected $fillable = [
        'halaman', 'link', 'published'
    ];

    public function filosopi_content(){
        return $this->hasMany('App\Filosopi_Content');
    }
    public function filosopi_image(){
        return $this->hasMany('App\Filosopi_Image');
    }
    public function header_content(){
        return $this->hasMany('App\Header_Content');
    }
    public function header_image(){
        return $this->hasMany('App\Header_Image');
    }
    public function sejarah_content(){
        return $this->hasMany('App\Sejarah_Content');
    }
    public function sejarah_image(){
        return $this->hasMany('App\Sejarah_Image');
    }
    public function struktur_pengurus(){
        return $this->hasMany('App\Setruktur_Pengurus');
    }
}
