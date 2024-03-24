@extends('layouts.main')

@section('title', 'Student')

@include('layouts.navbar')

@section('content')
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>

    <div class="container">
        <h3>Student Page</h3>
        <div class="row mb-4 align-items-center">
            <div class="col-lg">
                <a href="{{ route('student.create') }}" class="btn btn-primary border"><i class="bi bi-plus-square"></i></a>
            </div>
            <div class="col-lg">
                <form class="form-inline my-2 my-lg-0 float-right" action="{{ route('student.search') }}" method="GET">
                    <input class="form-control mr-sm-2 @error('keyword') is-invalid @enderror" type="search"
                        placeholder="Search by NIM" aria-label="Search" name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Major</th>
                    <th scope="col">Expertise</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $number => $student)
                    <tr>
                        <th scope="row">{{ $students->firstItem() + $number }}</th>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->expertise }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-success"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="{{ route('student.delete', $student->id) }}" method="post"
                                class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="7">Records not found</td>
                @endforelse
            </tbody>
        </table>
        <span class="float-right">
            {{ $students->links() }}
        </span>
    </div>
@endsection

@push('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
