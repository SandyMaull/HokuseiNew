@extends('admin.layouts.app')
@section('title')
    JangoDesa - Edit
@endsection
<div class="row">
    <div class="col-sm-6">
        <!-- textarea -->
        <div class="form-group">
        <label>Textarea</label>
        <textarea class="form-control" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 127px;"></textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Textarea Disabled</label>
        <textarea class="form-control" rows="3" placeholder="Enter ..." disabled="" style="margin-top: 0px; margin-bottom: 0px; height: 104px;"></textarea>
        </div>
    </div>
</div>