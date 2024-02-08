@extends('layouts.layouts')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<form action="{{ route('Announcement.update', $announcement->id)}}" method="POST">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6 mt-4" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">update announcement </h6>
        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput " value="{{ $announcement->title }}"
                placeholder="title">
            <label for="floatingInput">title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="content" class="form-control" id="floatingPassword"value="{{ $announcement->content }}"
                placeholder="content">
            <label for="floatingInput">content</label>
        </div>
        <div class="form-floating mb-3">
            
            <select class="form-select form-select " name="compagnie_id" aria-label=".form-select-lg example">
                 @foreach($compagnies as $Compagnie)
                <option value="{{$Compagnie->id}}" @if($Compagnie->id == $announcement->compagnie_id) selected @endif >{{$Compagnie->name}}</option>
                @endforeach
              
            </select>
            <label for="floatingInput">Compagnie</label>
         </div>

         <div class="form-floating mb-3">
            <select class="js-example-basic-multiple" name="skills[]" multiple="multiple">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" @if(in_array($skill->id, $announcement->skills->pluck('id')->toArray())) selected @endif>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"class="btn btn-sm btn-primary">update announcement</button>
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