<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header_Content extends Model
{
    protected $table = 'header_contents';
    protected $fillable = [
        'tampilan_id', 'content','bagian'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
