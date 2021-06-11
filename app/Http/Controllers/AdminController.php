<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tampilan;
use App\Header_Image;
use App\Header_Content;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Sejarah_Image;
use App\Sejarah_Content;
use App\Filosopi_Content;
use App\Struktur_Pengurus;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ADMIN PAGE
    public function index()
    {
        return view('admin.index');
    }

    // LAYOUT PAGE
    public function editberanda()
    {
        $header_img = Header_Image::all();
        $header_h1 = Header_Content::where('bagian', 'HeaderImages-H1')->first();
        $header_h2 = Header_Content::where('bagian', 'HeaderImages-H3')->first();
        $header_3 = Header_Content::where('bagian','head')->first();
        $header_h = [
            1 => $header_h1,
            2 => $header_h2,
            3 => $header_3
        ];
        $tampilan = Tampilan::all();
        $sej_img = Sejarah_Image::where('bagian','kaichou')->first();
        $sej = Sejarah_Content::where('bagian','sejarah')->first();
        $visi = Sejarah_Content::where('bagian','visi')->get();
        $misi = Sejarah_Content::where('bagian','misi')->get();
        $filo = Filosopi_Content::all();
        $bph = Struktur_Pengurus::whereIn('jabatan', ['Kaichou','Hisho','Kaikei'])->get();
        $kominfo = Struktur_Pengurus::whereIn('jabatan', ['K-KOMINFO','KOMINFO'])->get();
        $psdm = Struktur_Pengurus::whereIn('jabatan', ['K-PSDM','PSDM'])->get();
        $pendidikan = Struktur_Pengurus::whereIn('jabatan', ['K-PENDIDIKAN','PENDIDIKAN'])->get();
        $kebudayaan = Struktur_Pengurus::whereIn('jabatan', ['K-KEBUDAYAAN','KEBUDAYAAN'])->get();
        $kewirausahaan = Struktur_Pengurus::whereIn('jabatan', ['K-KEWIRAUSAHAAN','KEWIRAUSAHAAN'])->get();
        // dd($kominfo);
        return view('admin.edit.beranda', [
            'tampilan' => $tampilan, 'header_h' => $header_h,
             'slide' => $header_img, 'sej' => $sej, 'sej_img' => $sej_img,
             'visi' => $visi, 'misi' => $misi, 'filo' => $filo, 'bph' => $bph,
             'kominfo' => $kominfo, 'psdm' => $psdm, 'didik' => $pendidikan,
             'budaya' => $kebudayaan, 'usaha' => $kewirausahaan
             ]);
    }
    
    public function posteditpage(Request $request, $page)
    {

        $page = strtolower($page);
        $tampil = Tampilan::where('halaman',$page)->first();
        if($tampil === null || $tampil->published == 0)
        {
            return abort(404);
        }
        else
        {
            // dd($request->all());
            if ($page == 'beranda') {
                if($request->bagian == 'Judul_Headers'){
                    // dd($request->all());
                    $newh1_conn = Header_Content::where('bagian','HeaderImages-H1')->update([
                        'content' => $request->H1
                    ]);
                    $newh2_conn = Header_Content::where('bagian','HeaderImages-H3')->update([
                        'content' => $request->H3
                    ]);
                    $new3_conn = Header_Content::where('bagian','head')->update([
                        'content' => $request->head_content
                    ]);
                    if($newh1_conn && $newh2_conn && $new3_conn){
                        return redirect()->route('HomeEdit')->with(['status' => 'sukses','message' => ' Data Berhasil Diubah!']);
                    }
                    else {
                        return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' Data Gagal Diubah, Hubungi Admin!']);
                    }
                }
                if($request->bagian == 'slider_images'){
                    $this->validate($request, [
                        'img.*' => 'required|image|mimes:jpeg,png,jpg',
                    ]);
                    if($files = $request->file('img.*')) {
                        $images_data = Header_Image::where('id',$request->id_image)->first();
                        $orig = public_path($images_data->image);
                        $resize = public_path($images_data->resize);
                        if(File::exists($orig)){
                            File::delete($orig);
                            if (File::exists($resize)) {
                                File::delete($resize);
                            }
                            else {
                                return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
                            }
                        }
                        else {
                            return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
                        }
                        $looping = 1;
                        foreach($files as $file) {
                            $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                            $destinationPath = public_path('/img');
                            $canvas = Image::canvas(160, 100);
                            $resizeImage  = Image::make($file)->resize(160, 100, function($constraint) {
                                $constraint->aspectRatio();
                            });
                            $canvas->insert($resizeImage, 'center');
                            $canvas->save($destinationPath . '/resize_slider'. '/' . $name);
                            if($file->move($destinationPath, $name)) {
                                $imgslide = Header_Image::where('id', $request->id_image)->update([
                                    'tampilan_id' => $tampil->id,
                                    'image' => 'img/' . $name,
                                    'bagian' => $request->sliderbagian,
                                    'resize' => 'img/resize_slider'. '/' .$name
                                    ]);
                            }
                            else {
                                return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' File Gagal diubah, Check Permissions Settings!']);
                            }
                            $looping += 1;
                        }

                        return redirect()->route('HomeEdit')->with(['status' => 'sukses','message' => ' Data Berhasil Diubah!']);
                    }
                }
                if ($request->bagian == 'sejarah_images') {
                    // dd($request->all());
                    $this->validate($request, [
                        'img.*' => 'required|image|mimes:jpeg,png,jpg',
                    ]);
                    $sej_img = Sejarah_Image::where('id',$request->id_image)->first();
                    $img = public_path($sej_img->image);
                    $img_res = public_path($sej_img->resize);
                    if(File::exists($img) && File::exists($img_res)){
                        File::delete($img);
                        File::delete($img_res);
                        $files = $request->file('img.*');
                        $looping = 1;
                        foreach($files as $file) {
                            $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                            $destinationPath = public_path('/img');
                            $canvas = Image::canvas(160, 100);
                            $resizeImage  = Image::make($file)->resize(160, 100, function($constraint) {
                                $constraint->aspectRatio();
                            });
                            $canvas->insert($resizeImage, 'center');
                            $canvas->save($destinationPath . '/resize_slider'. '/' . $name);
                            if($file->move($destinationPath, $name)) {
                                $imgslide = Sejarah_Image::where('id', $request->id_image)->update([
                                    'tampilan_id' => $tampil->id,
                                    'image' => 'img/' . $name,
                                    'bagian' => $request->sliderbagian,
                                    'resize' => 'img/resize_slider'. '/' .$name
                                    ]);
                            }
                            else {
                                return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' File Gagal diubah, Check Permissions Settings!']);
                            }
                            $looping += 1;
                        }
                        return redirect()->route('HomeEdit')->with(['status' => 'sukses','message' => ' Data Berhasil Diubah!']);
                    }
                    else {
                        return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
                    }
                }
                if ($request->bagian == 'tentang'){
                    $sejarah_update = Sejarah_Content::where('bagian','sejarah')->update([
                        'content' => $request->Sejarah
                    ]);
                    $visi_update = Sejarah_Content::where('id', array_keys($request->Visi)[0])->update([
                        'content' => $request->Visi[array_keys($request->Visi)[0]]
                    ]);
                    $misi_count = count($request->Misi);
                    for ($i=0; $i < $misi_count; $i++) { 
                        $misi_update = Sejarah_Content::where('id', array_keys($request->Misi)[$i])->update([
                            'content' => $request->Misi[array_keys($request->Misi)[$i]]
                        ]);
                        if ($misi_update != 1) {
                            return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' Data Gagal Diubah, Hubungi Admin!']);
                        }
                    }
                    $filo_count = count($request->Fil_Bag);
                    for ($i=0; $i < $filo_count; $i++) { 
                        $filo_update = Filosopi_Content::where('id', array_keys($request->Fil_Bag)[$i])->update([
                            'bagian' => $request->Fil_Bag[array_keys($request->Fil_Bag)[$i]],
                            'content' => $request->filosofi[array_keys($request->Fil_Bag)[$i]]
                        ]);
                        if ($filo_update != 1) {
                            return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' Data Gagal Diubah, Hubungi Admin!']);
                        }
                    }

                    if ($sejarah_update && $visi_update) {
                        return redirect()->route('HomeEdit')->with(['status' => 'sukses','message' => ' Data Berhasil Diubah!']);
                    }
                    else {
                        return redirect()->route('HomeEdit')->with(['status' => 'error','message' => ' Data Gagal Diubah, Hubungi Admin!']);
                    }
                    // $misi_update = Sejarah_Content::where('id',)
                    // dd($misi_count);
                }
            }

        }
    }

    public function postaddpage(Request $request, $page)
    {
        $page = strtolower($page);
        $tampil = Tampilan::where('halaman',$page)->first();
        if($tampil === null || $tampil->published == 0)
        {
            return abort(404);
        }
        else
        {
            if($page == 'beranda') {
                if($request->bagian == 'slider_images'){
                    $this->validate($request, [
                        'img.*' => 'required|image|mimes:jpeg,png,jpg',
                    ]);
                    if($files = $request->file('img.*')) {
                        $looping = 1;
                        foreach($files as $file) {
                            $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                            $destinationPath = public_path('/img');
                            $canvas = Image::canvas(160, 100);
                            $resizeImage  = Image::make($file)->resize(160, 100, function($constraint) {
                                $constraint->aspectRatio();
                            });
                            $canvas->insert($resizeImage, 'center');
                            $canvas->save($destinationPath . '/resize_slider'. '/' . $name);
                            if($file->move($destinationPath, $name)) {
                                $imgslide = new Header_Image;
                                $imgslide->tampilan_id = $tampil->id;
                                $imgslide->image = 'img/' . $name;
                                $imgslide->bagian = 'slide';
                                $imgslide->resize = 'img/resize_slider'. '/' .$name;
                                $imgslide->save();
                            }
                            $looping += 1;
                        }
                        return redirect()->route('HomeEdit')->with(['status' => 'sukses','message' => ' Data Berhasil Ditambah!']);
                    }
                }
            }
        }
    }

    public function postdeletepage(Request $request, $page)
    {
        $page = strtolower($page);
        $tampil = Tampilan::where('halaman',$page)->first();
        if($tampil === null || $tampil->published == 0)
        {
            return abort(404);
        }
        else
        {
            if($page == 'beranda'){
                if($request->bagian == 'slider_images'){
                    $imgdata = Header_Image::where('id',$request->id_image)->first();
                    $orig = public_path($imgdata->image);
                    $resize = public_path($imgdata->resize);
                    if(File::exists($orig)){
                        if (File::exists($resize)) {
                            $hapus = Header_Image::destroy($request->id_image);
                            if ($hapus){
                                File::delete($orig);
                                File::delete($resize);
                                return redirect()->route('HomeEdit', ['page' => $page])->with(['status' => 'sukses','message' => ' Image Slider berhasil dihapus!']);
                            }
                            else {
                                return redirect()->route('HomeEdit', ['page' => $page])->with(['status' => 'error','message' => ' Data File tidak ada di Database!']);
                            }
                        }
                        else {
                            return redirect()->route('HomeEdit', ['page' => $page])->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
                        }
                    }
                    else {
                        return redirect()->route('HomeEdit', ['page' => $page])->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
                    }
                }
            }
        }
    }
}
