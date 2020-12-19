<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filosopi_Image extends Model
{
    protected $table = 'filosopi_image';
    protected $fillable = [
        'tampilan_id', 'image', 'bagian'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
