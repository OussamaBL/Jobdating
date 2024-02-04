@extends('layouts.layouts')
@section('title')
Dashboard
@endsection
@section('content')

    <div class="container-fluid position-relative d-flex p-0">

         <!-- Content Start -->
        <div class="content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">compagnies</h6>
                         <a class="btn btn-sm btn-primary" href="{{ route('Compagnies.formCompagnies') }}">add compagnie</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                 
                                    <th scope="col">name</th>
                                    <th scope="col">address</th>
                                    <th scope="col">contact</th>
                                    <th scope="col">field of activity</th>
                                    {{-- <th scope="col">createdDate</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($compagnies as $compagnie)
                                
                                <tr>
                                    <td>{{ $compagnie->name }}</td>
                                    <td>{{ $compagnie->address }}</td>
                                    <td>{{ $compagnie->contact }}</td>
                                    <td>{{ $compagnie->field_of_activity }}</td>
                                    {{-- <td>{{ $compagnie->title }}</td> --}}
                                    <td>
                                        <form action="{{ route('compagnie.destroy',$compagnie->id) }}" method="POST">
                                           
                                        <a class="btn btn-success" href="{{ route('compagnie.edit',$compagnie->id) }}">update</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"class="btn btn-primary" >delete</button>
                                        </form>
                                    </td>
                                 </tr>
                                 @endforeach
                                 {{ $compagnies->links('pagination::bootstrap-5') }}
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