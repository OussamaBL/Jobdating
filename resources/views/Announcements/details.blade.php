@extends('layouts.app')
@section('title')
Details Announcement
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
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Announcement</h6>
                    </div>
                    
                    <div class="row" style="justify-content: center">
                        <div class="col-12">
                            <img src="{{ asset('images/'.$announcement->image.' ') }}" style="width: 100%" >
                        </div>
                        <div class="col-12">
                            <h2>{{ $announcement->title }}</h2>
                            <p>{{ $announcement->content }}</p>
                            <div style="text-align: center">
                                <form action="{{ route('postuler',$announcement->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-secondary" value="postuler">
                                </form>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


@endsection

