@extends('admin.layouts.app')

@section('title_header')
Hokusei - Layouts    
@endsection

@section('breadcrumb')
<h1 class="mt-4">Pages</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Layouts</li>
    <li class="breadcrumb-item active">Pages</li>
</ol>
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tampilan<div class="float-right"><a href="" data-toggle="modal" 
            data-target="#tambahModalTampilan"><i class="fas fa-user-plus"></i><span>Tambah Data</span></a></div></div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Halaman</th>
                    <th>Link</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Halaman</th>
                    <th>Link</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                    @foreach ($tampilan as $tamp)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tamp->halaman}}</td>
                    <td><a href="{{ url($tamp->link) }}">{{$tamp->link}}</a></td>
                    <td>@if ($tamp->published == 1)
                        Ya
                        @else
                        Tidak
                        @endif                        
                    </td>
                    <td>
                        @if ($tamp->halaman == 'HomePage')
                            <i class="fas fa-user-minus"></i>
                        @else
                            <a class="text-danger hapusfungsi" data-id="{{ $tamp->id }}"
                                data-toggle="modal" data-target="#deleteModal" href="">
                                <i class="fas fa-user-minus"></i>
                            </a>
                        @endif
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Last Updated at jaja by jaja - jaja</div> --}}
</div>
    

<!-- Modal Delete -->
<form action="jaja" method="POST">
    @csrf
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            Apakah anda serius ingin menghapus content dan halaman ini ?
            <input type="hidden" id="deleteID" name="id">
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger" type="submit">Delete</button>
        </div>
        </div>
    </div>
</div>
</form>
<!-- END OF MODAL DELETE -->


<!-- Modal Tambah -->
<div class="modal fade" id="tambahModalTampilan" tabindex="-1" role="dialog" aria-labelledby="tambahModalTampilanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalTampilanLabel">Tambah Halaman Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="jaja" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="recipient-name" name="title">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Body:</label>
                    <textarea class="form-control" id="message-text" name="body" rows="15"></textarea>
                    <input type="hidden" name="userid" value="jaja">
                    <input type="hidden" name="bidangid" value='jaja'>
                </div>
                <div class="form-group">
                    <label for="gambar">Header Image</label>
                    <input type="file" class="form-control-file" accept="image/x-png,image/jpg,image/jpeg" id="gambar" name="gambar" />
                    <span>jpeg,jpg,png - Max 8 MB</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Data</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- END OF MODAL TAMBAH -->
@endsection