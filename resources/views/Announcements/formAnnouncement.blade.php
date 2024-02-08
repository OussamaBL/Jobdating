@extends('layouts.layouts')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('Announcement.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
 <div class="col-sm-12 col-xl-6 mt-4" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput"
                placeholder="title">
            <label for="floatingInput">title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="content" class="form-control" id="floatingPassword"
                placeholder="content">
            <label for="floatingInput">content</label>
        </div>
    
        <div class="form-floating mb-3">
            <select class="form-select form-select " name="compagnie_id" aria-label=".form-select-lg example">
                <option selected>select your company</option>
                @foreach($compagnies as $Compagnie)
                    <option value="{{$Compagnie->id}}">{{$Compagnie->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-floating mb-3">
            <select class="js-example-basic-multiple" name="skills[]" multiple="multiple">
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                @endforeach
            </select>
        </div>

        


         <div class="form-floating mb-3">
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
            <label for="floatingInput">Image</label>
        </div>
      
        <button type="submit"class="btn btn-sm btn-primary">add compagnie</button>

       
    </div>
</div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
            </script>
@endpush