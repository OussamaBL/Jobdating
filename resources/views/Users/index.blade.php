@extends('layouts.layouts')
@section('title')
Users
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
                        <h6 class="mb-0">Users</h6>
                         <a class="btn btn-sm btn-primary" href="{{ route('Compagnies.formCompagnies') }}">add compagnie</a>
                    </div>
             
                    <div class="table-responsive">

                        
                            <div class="container">
                                <div class="card">
                                    <div class="card-header">Manage Users</div>
                                    <div class="card-body">
                                        {{ $dataTable->table() }}
                                    </div>
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

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }} 

@endpush
