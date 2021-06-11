<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Header_Image;
use App\Header_Content;
use App\Sejarah_Content;
use App\Sejarah_Image;
use App\Filosopi_Content;
use App\Filosopi_Image;
use App\Struktur_Pengurus;

class HomepageController extends Controller
{
    public function index()
    {
        $header_image = Header_Image::all();
        $header_content = Header_Content::where('bagian', 'head')->first();
        $header_h1 = Header_Content::where('bagian','HeaderImages-H1')->first();
        $header_h3 = Header_Content::where('bagian','HeaderImages-H3')->first();
        $sejarah_image = Sejarah_Image::where('bagian', 'kaichou')->first();
        $sejarah = Sejarah_Content::where('bagian', 'sejarah')->first();
        $visi = Sejarah_Content::where('bagian', 'visi')->first();
        $misi = Sejarah_Content::where('bagian', 'misi')->get();
        $filosopi_image = Filosopi_Image::where('bagian', 'logo')->first();
        $filosopi_content_1 = Filosopi_Content::where('id', 1)->first();
        $filosopi_content_2 = Filosopi_Content::where('id', 2)->first();
        $pengurus = Struktur_Pengurus::where('tampilan_id',1)->get();
        return view('index', ['head_image' => $header_image, 
        'head_content' => $header_content, 'sej_img' => $sejarah_image,
        'sejarah' => $sejarah, 'visi' => $visi, 'misi' => $misi,
        'fil_image' => $filosopi_image, 'fil_content_1' => $filosopi_content_1, 
        'h1' => $header_h1, 'h3' => $header_h3, 'fil_content_2' => $filosopi_content_2,
        'pengurus' => $pengurus]);
        // dd($filosopi_content_2);
    }
    public function logo()
    {
        return view('logo');
    }
    public function kegiatan()
    {
        return view('kegiatan');
    }
}
