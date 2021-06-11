<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sejarah_Content extends Model
{
    protected $table = 'sejarah_contents';
    protected $fillable = [
        'tampilan_id', 'content','bagian'
    ];

    public function tampilan(){
        return $this->belongsTo('App\Tampilan');
    }
}
