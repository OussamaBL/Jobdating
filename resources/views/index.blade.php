@extends('layouts.app')
@section('content')

        <!-- # site-content
        ================================================== -->
        
            <!-- about
            ----------------------------------------------- -->
            <section id="about" class="s-about target-section">
                <h2 style="text-align: center">Announcements</h2>
                
                <div class="row process-list list-block show-ctr block-lg-one-half block-tab-whole ">
                
                @foreach ($announcements as $announcement)
        
                    <div class="col-4" style="box-shadow: 5px 5px 20px 1px #00000066;">
                        <div class="card" style="width: 33rem;">
                            <img src="{{ asset('images/'.$announcement->image.'') }}" style="margin-bottom: 0px" class="card-img-top" alt="...">
                            <div class="card-body" style="padding: 15px">
                                <h5 class="card-title" style="margin-bottom: 0px;margin-top: 0px">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ substr($announcement->content, 0, 20) }}</p>
                                <a href="{{ route('announce.details',$announcement->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>

                @endforeach

                   
                </div> <!-- end process-list -->

            </section> <!-- end s-about -->

 

@endsection