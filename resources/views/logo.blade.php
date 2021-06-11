@extends('homelay.app')

@section('body')

<div class="container-fluid padding" id="Logo">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Filosofi Logo Hokusei</h1>
            <hr>
        </div>
    </div>
    <div class="row padding text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img src="{{ asset('img/hokusei-logo-fix.png') }}" class="img-fluid" style="width:320px;height:320px;">
            <br>
        </div>
        <div class="col-lg-6">
            <h5>Gate torii (Gerbang)</h5>
            <p>
                Sebuah gerbang untuk menunjukan bahwa itu adalah gerbang utama UKM HOKUSEI.
            </p>
            <h5>Warna Merah</h5>
            <p>
                Merah yang berarti semangat, warna ini juga mengartikan bahwa UKM HOKUSEI UTS
                sangatlah bersemangat untuk mengenalkan Ilmu Sastra dan Kebudayaan Jepang
            </p>
        </div>
        <div class="col-lg-6">
            <h5>Buku</h5>
            <p>
                Buku pada tengah logo bertujuan bahwa itulah <i>icon</i> sumber ilmu yang bisa kita dapat
            </p>
            <h5>Sarang Lebah</h5>
            <p>
                Seperti logo Universitas Teknologi Sumbawa sarang lebah ini menyimpan hal-hal yang baik untuk
                disimpan pada UKM Hokusei UTS.
            </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5>Lingkaran</h5>
            <p>
                Dimaksudkan semua unsur logo tidak keluar dari visi misi Hokusei, dan harapannya UKM Hokusei ini dapat
                dilihat dari berbagai sudut pandang.

            </p>
        </div>
    </div>
</div>

@endsection