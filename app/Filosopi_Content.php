<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filosopi_Content extends Model
{
    protected $table = 'filosopi_contents';
    protected $fillable = [
        'tampilan_id', 'isi','content','class'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
