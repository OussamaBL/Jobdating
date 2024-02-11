@extends('layouts.app')
@section('title') Profile @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container{
            width: 100% !important;
            text-align: left !important;
        }
    </style>
    @endsection

@section('content')


    <div class="container-fluid position-relative d-flex p-0">

         <!-- Content Start -->
        <div class="content" style="margin-left: 0px !important;width: 100%">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class=" text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Profile</h6>
                    </div>
                    
                    <div class="row" style="justify-content: center">
                        <form action="{{ route('users.update',0) }}" method="POST" style="width: 35%">
                            @csrf
                            @method('PUT')
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" style="width: 100%" name="name" id="name" class="form-control" placeholder="Full name" value="{{ Auth::user()->name }}" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="text" style="width: 100%" name="email" id="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" aria-label="Last name">
                            </div>
                            <div class="col">
                                <label for="adress">Adress</label>
                                <input type="text" style="width: 100%" name="adress" id="adress" class="form-control" placeholder="Adress" value="{{ Auth::user()->adress }}" aria-label="Last name">
                            </div>
                            <div class="col">
                                <label for="name">Skills</label>
                                <select class="js-example-basic-multiple" name="skills[]" multiple="multiple">
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" @if(in_array($skill->id, Auth::user()->skills->pluck('id')->toArray())) selected @endif>
                                            {{ $skill->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="submit" class="form-control" value="Update">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="container">
                <h2 style="text-align: center">Skills</h2>  
                <div class="row">
                    <div class="col-12" style="margin: 0 auto">
                        <ul>
                            @foreach(Auth::user()->skills as $skill)
                                <li>{{ $skill->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2 style="text-align: center">announcements</h2>  
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-4" style="box-shadow: 5px 5px 20px 1px #00000066;">
                            <div class="card" style="width: 33rem;">
                                <img src="{{ asset('images/'.$announcement->image.'') }}" style="margin-bottom: 0px" class="card-img-top" alt="...">
                                <div class="card-body" style="padding: 15px">
                                    <h5 class="card-title" style="margin-bottom: 0px;margin-top: 0px">{{ $announcement->title }}</h5>
                                    <p class="card-text">{{ substr($announcement->content, 0, 20) }}</p>
                                    <strong>Skills</strong>
                                    <ul>
                                        @foreach($announcement->skills as $skill)
                                            <li>{{ $skill->name }}</li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('announce.details',$announcement->id) }}" class="btn btn-primary">Details</a>
                                
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
            </script>
    <script>
        document.querySelector('.select2').style.width='100% :important';
    </script>
@endpush
