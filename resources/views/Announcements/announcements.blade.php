@extends('layouts.layouts')
@section('title')
Dashboard
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


            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Announcement</h6>
                        <a class="btn btn-sm btn-primary" href="{{ route('Announcement.formAnnouncement') }}">Add Announcement</a>
                    </div>
             
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th>Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td style="text-align: center">
                                            <img src="{{ asset('images/'.$announcement->image.' ') }}" style="width: 140px" alt="">
                                        </td>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{ $announcement->content }}</td>
                                        <td>{{ $announcement->compagnie->name }}</td>
                                        <td>
                                            @foreach($announcement->skills as $skill) {{ $skill->name }} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('Announcement.destroy', $announcement->id) }}" method="POST">
                                                <a class="btn btn-success" href="{{ route('Announcement.edit', $announcement->id) }}">Update</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $announcements->links('pagination::bootstrap-5') }}
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