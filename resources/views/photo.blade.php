@extends('layouts.app')
@section('content')
<div class="row container m-5">
    <form method="POST" action="{{route('post_upload_photo')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <input type="file" id="images" class="form-control"  name="images[]"  multiple >
            <button class="btn btn-primary m-3">Upload</button>
        </div>
    </form>
</div>

@endsection