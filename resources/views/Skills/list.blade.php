@extends('layouts.layouts')
@section('title')
Skills
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
                        <h6 class="mb-0">Skills</h6>
                         <a class="btn btn-sm btn-primary" href="{{ route('skill.add') }}">add skill</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                 
                                    <th scope="col">name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($skills as $skill)
                                
                                <tr>
                                    <td>{{ $skill->name }}</td>
                                    <td>
                                        <form action="{{ route('skill.destroy',$skill->id) }}" method="POST">
                                           
                                        <a class="btn btn-success" href="{{ route('skill.edit',$skill->id) }}">update</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-primary" >delete</button>
                                        </form>
                                    </td>
                                 </tr>
                                 @endforeach
                                 {{ $skills->links('pagination::bootstrap-5') }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


@endsection