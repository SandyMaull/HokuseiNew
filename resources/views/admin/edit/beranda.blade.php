@extends('admin.layouts.app')

@section('title')
    Hokusei - Beranda Edit
@endsection

@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Beranda</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Tampilan</li>
                <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Head Sliders -->
    <form action="{{ url('administrator/edit/beranda') }}" method="post">
        @csrf
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Judul Slider Images</h3>
                <div class="card-tools">
                    <button id="slider_button" style="display:none;" type="submit" class="btn btn-tool btn-primary">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" name="bagian" value="Judul_Headers">
                <input id="slider_h1" class="form-control form-control-lg" name="H1" type="text" placeholder="H1" value="{{ $header_h['1']->content }}">
                <br>
                <input id="slider_h3" class="form-control" type="text" name="H3" placeholder="H3" value="{{ $header_h['2']->content }}">
                <br>
                <input id="slider3" class="form-control" type="text" name="head_content" placeholder="Trending" value="{{ $header_h['3']->content }}">
            </div>
            <!-- /.card-body -->
        </div>
    </form>

    <!-- SLIDER IMAGES -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Slider Images</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @foreach ($slide as $sld)
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                            <div class="input-group input-group-sm">
                                <img src="{{ asset($sld->resize) }}">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Image Slider" data-bag="{{$sld->bagian}}" data-src="{{ asset($sld->resize) }}" data-idimage="{{$sld->id}}"  data-toggle="modal" data-target="#Edit_Slider">Edit</button>
                                   
                                    @if ($sld->bagian == 'first')
                                        <button type="button" class="btn btn-danger" disabled>
                                            Delete
                                        </button>    
                                    @else
                                        <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($sld->resize) }}" data-idimage="{{$sld->id}}" data-toggle="modal" data-target="#Hapus_Slider">
                                            Delete
                                        </button>
                                    @endif

                                </span>
                            </div>
                        </div>
                    @endforeach
                    <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Slider">
                            <i class="fas fa-plus"></i>
                            Add New Images
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Tentang Hokusei -->
    <form name="tentang" action="{{ url('administrator/edit/beranda') }}" method="post">
        @csrf
        <div class="card card-info card-tabs">
            <div class="card-header p-0 pt-1">
                <div class="card-title">
                    <ul class="nav nav-tabs" id="sejarah-tab" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title">Tentang Hokusei</h3></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="Sejarah-tab" data-toggle="pill" href="#Sejarah" role="tab" aria-controls="Sejarah" aria-selected="true">Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="visi-tab" data-toggle="pill" href="#visi" role="tab" aria-controls="visi" aria-selected="false">Visi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="misi-tab" data-toggle="pill" href="#misi" role="tab" aria-controls="misi" aria-selected="false">Misi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="filosofi-tab" data-toggle="pill" href="#filosofi" role="tab" aria-controls="filosofi" aria-selected="false">Filosofi</a>
                        </li>
                    </ul>
                </div>
                <div class="card-tools">
                    <button id="tentang_button" style="display:none;" type="submit" class="btn btn-tool btn-primary">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="sejarah-tabContent">
                    <div class="tab-pane fade show active" id="Sejarah" role="tabpanel" aria-labelledby="Sejarah-tab">
                        <div class="row align-items-center">
                            <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <span class="input-group-append">
                                <img src="{{ asset($sej_img->resize) }}" >
                                <button type="button" class="btn btn-info btn-warning" data-content="sejarah_images" data-edit_header="Edit Image Sejarah" data-bag="{{$sej_img->bagian}}" data-src="{{ asset($sej_img->resize) }}" data-idimage="{{$sej_img->id}}"  data-toggle="modal" data-target="#Edit_Slider">Edit</button>
                                </span>
                            </div>
                            <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                <textarea class="form-control" id="Sejarah_textarea" rows="3" name="Sejarah" style="margin-top: 0px; margin-bottom: 0px; height: 127px;" placeholder="Sejarah Hokusei">{{$sej->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="visi-tab">
                        <input type="hidden" name="bagian" value="tentang">
                        @foreach ($visi as $visi)
                            <input class="form-control form-control-sm" id="Visi_{{$loop->index}}" name="Visi[{{$visi->id}}]" type="text" placeholder="Visi Hokusei" value="{{$visi->content}}">
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="misi" role="tabpanel" aria-labelledby="misi-tab">
                        @foreach ($misi as $misi)
                            <input class="form-control form-control-sm" id="Misi_{{$loop->index}}" name="Misi[{{$misi->id}}]" type="text" placeholder="Misi Hokusei" value="{{$misi->content}}">
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="filosofi" role="tabpanel" aria-labelledby="filosofi-tab">
                        @foreach ($filo as $filo)
                            <input class="form-control form-control-sm" id="Fil_Bag_{{$loop->index}}" name="Fil_Bag[{{$filo->id}}]" type="text" placeholder="Simbolis Logo Hokusei" value="{{$filo->bagian}}">
                            <input class="form-control form-control-sm" id="filosofi_{{$loop->index}}" name="filosofi[{{$filo->id}}]" type="text" placeholder="Filosofi Simbol Logo" value="{{$filo->content}}">
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </form>

    <!-- Struktur Kepengurusan -->
    <div class="card card-info card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-title">
                <ul class="nav nav-tabs" id="pengurus-tab" role="tablist">
                    <li class="pt-2 px-3"><h3 class="card-title">Struktur Pengurus</h3></li>
                    <li class="nav-item">
                        <a class="nav-link active" id="bph-tab" data-toggle="pill" href="#BPH" role="tab" aria-controls="BPH" aria-selected="true">BPH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kominfo-tab" data-toggle="pill" href="#kominfo" role="tab" aria-controls="kominfo" aria-selected="false">KOMINFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="psdm-tab" data-toggle="pill" href="#psdm" role="tab" aria-controls="psdm" aria-selected="false">PSDM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pendidikan-tab" data-toggle="pill" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">PENDIDIKAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kebudayaan-tab" data-toggle="pill" href="#kebudayaan" role="tab" aria-controls="kebudayaan" aria-selected="false">KEBUDAYAAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kewirausahaan-tab" data-toggle="pill" href="#kewirausahaan" role="tab" aria-controls="kewirausahaan" aria-selected="false">KEWIRAUSAHAAN</a>
                    </li>
                </ul>
            </div>
            <div class="card-tools">
                <button id="tentang_button" style="display:none;" type="submit" class="btn btn-tool btn-primary">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content" id="bph-tabContent">
                <div class="tab-pane fade show active" id="BPH" role="tabpanel" aria-labelledby="bph-tab">
                    <div class="row align-items-center">

                        @foreach ($bph as $bph)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($bph->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$bph->jabatan}}" data-src="{{ asset($bph->image) }}" data-idimage="{{$bph->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                        <button type="button" class="btn btn-danger" disabled>
                                            Delete
                                        </button>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="kominfo" role="tabpanel" aria-labelledby="kominfo-tab">
                    <div class="row align-items-center">

                        @foreach ($kominfo as $kominfo)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($kominfo->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$kominfo->jabatan}}" data-src="{{ asset($kominfo->image) }}" data-idimage="{{$kominfo->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                    
                                        @if ($kominfo->jabatan == 'K-KOMINFO')
                                            <button type="button" class="btn btn-danger" disabled>
                                                Delete
                                            </button>    
                                        @else
                                            <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($kominfo->image) }}" data-idimage="{{$kominfo->id}}" data-toggle="modal" data-target="#Hapus_Pengurus">
                                                Delete
                                            </button>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Pengurus">
                                <i class="fas fa-plus"></i>
                                Tambah Pengurus Baru
                            </button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="psdm" role="tabpanel" aria-labelledby="psdm-tab">
                    <div class="row align-items-center">

                        @foreach ($psdm as $psdm)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($psdm->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$psdm->jabatan}}" data-src="{{ asset($psdm->image) }}" data-idimage="{{$psdm->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                    
                                        @if ($psdm->jabatan == 'K-PSDM')
                                            <button type="button" class="btn btn-danger" disabled>
                                                Delete
                                            </button>    
                                        @else
                                            <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($psdm->image) }}" data-idimage="{{$psdm->id}}" data-toggle="modal" data-target="#Hapus_Pengurus">
                                                Delete
                                            </button>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Pengurus">
                                <i class="fas fa-plus"></i>
                                Tambah Pengurus Baru
                            </button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                    <div class="row align-items-center">

                        @foreach ($didik as $didik)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($didik->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$didik->jabatan}}" data-src="{{ asset($didik->image) }}" data-idimage="{{$didik->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                    
                                        @if ($didik->jabatan == 'K-PENDIDIKAN')
                                            <button type="button" class="btn btn-danger" disabled>
                                                Delete
                                            </button>    
                                        @else
                                            <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($didik->image) }}" data-idimage="{{$didik->id}}" data-toggle="modal" data-target="#Hapus_Pengurus">
                                                Delete
                                            </button>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Pengurus">
                                <i class="fas fa-plus"></i>
                                Tambah Pengurus Baru
                            </button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="kebudayaan" role="tabpanel" aria-labelledby="kebudayaan-tab">
                    <div class="row align-items-center">

                        @foreach ($budaya as $budaya)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($budaya->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$budaya->jabatan}}" data-src="{{ asset($budaya->image) }}" data-idimage="{{$budaya->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                    
                                        @if ($budaya->jabatan == 'K-KEBUDAYAAN')
                                            <button type="button" class="btn btn-danger" disabled>
                                                Delete
                                            </button>    
                                        @else
                                            <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($budaya->image) }}" data-idimage="{{$budaya->id}}" data-toggle="modal" data-target="#Hapus_Pengurus">
                                                Delete
                                            </button>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Pengurus">
                                <i class="fas fa-plus"></i>
                                Tambah Pengurus Baru
                            </button>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="kewirausahaan" role="tabpanel" aria-labelledby="kewirausahaan-tab">
                    <div class="row align-items-center">

                        @foreach ($usaha as $usaha)
                            <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4" style="margin-bottom: 2em;">
                                <div class="input-group input-group-sm">
                                    <img src="{{ asset($usaha->image) }}">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-warning" data-content="slider_images" data-edit_header="Edit Struktur Pengurus" data-bag="{{$usaha->jabatan}}" data-src="{{ asset($usaha->image) }}" data-idimage="{{$usaha->id}}"  data-toggle="modal" data-target="#Edit_Pengurus">Edit</button>
                                    
                                        @if ($usaha->jabatan == 'K-KEWIRAUSAHAAN')
                                            <button type="button" class="btn btn-danger" disabled>
                                                Delete
                                            </button>    
                                        @else
                                            <button type="button" class="btn btn-danger" data-content="slider_images" data-src="{{ asset($usaha->image) }}" data-idimage="{{$usaha->id}}" data-toggle="modal" data-target="#Hapus_Pengurus">
                                                Delete
                                            </button>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-4 align-self-center" style="margin-bottom: 2em;">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Tambah_Pengurus">
                                <i class="fas fa-plus"></i>
                                Tambah Pengurus Baru
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>

    
    {{-- FORM MODAL SLIDERS --}}
    <!-- Modal Tambah Slider-->
    <form action="{{ url('administrator/tambah/beranda') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="Tambah_Slider" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Slider Images</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sliderimagesuploadtambah">Images File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="bagian" value="slider_images">
                                <input type="file" name="img[]" class="custom-file-input" id="sliderimagesuploadtambah" accept="image/png, image/jpeg, images/jpg" multiple>
                                <label id="sliderimagesuploadlabeltambah" class="custom-file-label" for="sliderimagesuploadtambah">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </form>

    <!-- Modal Edit Slider-->
    <form action="{{ url('administrator/edit/beranda') }}" method="post" enctype="multipart/form-data">
        @csrf  
        <div class="modal fade" id="Edit_Slider" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <img src="" id="imageSRCEDIT"><br>
                        <label for="sliderimagesuploadedit">Pilih Images File Terbaru</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" id="contentBAG" name="bagian" value="">
                                <input type="hidden" id="editID" name="id_image">
                                <input type="hidden" id="bagianID" name="sliderbagian">
                                <input type="file" name="img[]" class="custom-file-input" id="sliderimagesuploadedit" accept="image/png, image/jpeg, images/jpg">
                                <label id="sliderimagesuploadlabeledit" class="custom-file-label" for="sliderimagesuploadedit">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </form>

    <!-- Modal Delete Slider-->
    <form action="{{ url('administrator/delete/beranda') }}" method="post">
        @csrf
        <div class="modal fade" id="Hapus_Slider" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <img src="" id="imageSRCDEL">
                        <p>Apakah anda serius ingin menghapus slider image ini ?</p>
                    </div>
                    <input type="hidden" id="deleteID" name="id_image">
                    <input type="hidden" name="bagian" value="slider_images">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>

    {{-- FORM MODAL PENGURUS --}}
    <!-- Modal Tambah Pengurus-->
    <form action="{{ url('administrator/tambah/beranda') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="Tambah_Pengurus" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengurus Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pengurusimagesuploadtambah">Images File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="bagian" value="pengurus">
                                <input type="file" name="img[]" class="custom-file-input" id="pengurusimagesuploadtambah" accept="image/png, image/jpeg, images/jpg" multiple>
                                <label id="sliderimagesuploadlabeltambah" class="custom-file-label" for="pengurusimagesuploadtambah">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </form>
@endsection

@section('script')
    <script>
        // FUNGSI SUBMIT BUTTON JUDUL SLIDER //
        var h1 = '{{ $header_h['1']->content }}';
        var h3 = '{{ $header_h['2']->content }}';
        var head3 = '{{ $header_h['3']->content }}';
        var x = document.getElementById("slider_button");
        function comparesubmit(){
            var headh1t = document.getElementById("slider_h1").value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
            var headh3t = document.getElementById("slider_h3").value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
            var head3t = document.getElementById("slider3").value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
            if(headh1t != h1 || headh3t != h3 || head3t != head3){
                x.style.display = "inline-block";
            }
            else {
                x.style.display = "none";
            }
        }
        $("#slider_h1").on("input", function () {
            comparesubmit();
        });
        $("#slider_h3").on("input", function () {
            comparesubmit();
        });
        $("#slider3").on("input", function () {
            comparesubmit();
        });


        // FUNGSI MODAL SLIDER //
        $('#Tambah_Slider').on('show.bs.modal', function(event) {

            var profilePic = document.getElementById('sliderimagesuploadtambah'); /* finds the input */
            $(document).ready(function(){
                $('#sliderimagesuploadtambah').change(function(e){
                    if($('#sliderimagesuploadtambah')[0].files){
                        var numFiles = $('#sliderimagesuploadtambah')[0].files
                        for (var i = 0; i < numFiles.length; i++)
                        {
                            if (i == 0) {
                                var strings = numFiles[i].name;
                            }
                            else {
                                strings = strings+","+numFiles[i].name;
                            }
                        }
                        if(strings != undefined) {
                            var res = strings.slice(0, 40)+" ...";
                            document.getElementById('sliderimagesuploadlabeltambah').innerText = res;
                        }
                    }
                });
            });

        });

        $('#Edit_Slider').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('idimage')
            var src = button.data('src')
            var bag = button.data('bag')
            var edit = button.data('edit_header')
            var content = button.data('content')
            var modal = $(this)
            document.getElementById("imageSRCEDIT").src = src;
            modal.find('.modal-body #editID').val(id);
            modal.find('.modal-body #bagianID').val(bag);
            modal.find('.modal-body #contentBAG').val(content);
            modal.find('.modal-title').text(edit);

            var profilePic = document.getElementById('sliderimagesuploadedit'); /* finds the input */
            $(document).ready(function(){
                $('#sliderimagesuploadedit').change(function(e){
                    if($('#sliderimagesuploadedit')[0].files){
                        var numFiles = $('#sliderimagesuploadedit')[0].files
                        for (var i = 0; i < numFiles.length; i++)
                        {
                            if (i == 0) {
                                var strings = numFiles[i].name;
                            }
                            else {
                                strings = strings+","+numFiles[i].name;
                            }
                        }
                        if(strings != undefined) {
                            var res = strings.slice(0, 40)+" ...";
                            document.getElementById('sliderimagesuploadlabeledit').innerText = res;
                        }
                    }
                });
            });

        });

        $('#Hapus_Slider').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('idimage')
        var src = button.data('src')
        var modal = $(this)
        modal.find('.modal-title').text('Delete Image Slider ?');
        document.getElementById("imageSRCDEL").src = src;
        modal.find('.modal-body #deleteID').val(id);
        });


        // FUNGSI SUBMIT BUTTON TENTANG //
        var y = document.getElementById("tentang_button");
        var e = document.forms["tentang"].getElementsByTagName('input');
        var i;
        var s = 0;
        var jq = '';
        var temp_tentang = new Array();
        var key_temp = '';
        for( i=0; i<e.length; i++ ){
            if(e[i].type == "text") {
                if(e[i].placeholder == 'Visi Hokusei' || e[i].placeholder == 'Misi Hokusei' || e[i].placeholder == 'Simbolis Logo Hokusei' || e[i].placeholder == 'Filosofi Simbol Logo'){
                    temp_tentang[s] = [e[i].id, e[i].value];
                    jq += '#' + e[i].id + ', ';
                    s++;
                }
            }
        }
        var sej_con = document.getElementById('Sejarah_textarea').value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
        var sej_in_id = jq.slice(0,-2);
        console.log(sej_in_id);
        function comparetentang() {
            var i;
            for (i = 0; i < temp_tentang.length; i++) {
                var getdatabyID = document.getElementById(temp_tentang[i][0]).value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
                var sej_con_new = document.getElementById('Sejarah_textarea').value.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
                if(sej_con != sej_con_new || getdatabyID != temp_tentang[i][1]) {
                    y.style.display = "inline-block";
                    break;
                }
                else {
                    y.style.display = "none";
                }
            }
        }

        $('#Sejarah_textarea').each(function(){
            $(this).on("input", function () {
                comparetentang();
            });
        });

        $(sej_in_id).each(function(){
            $(this).on("input", function () {
                comparetentang();
            });
        });
        
    </script>
    
@endsection