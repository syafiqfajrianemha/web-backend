@extends('layouts.main')

@section('title', 'User')

@include('layouts.navbar')

@section('content')
    <div class="container">
        <h3>User Page</h3>
        <div class="row mb-4">
            <div class="col-lg-12">
                <form class="form-inline my-2 my-lg-0 float-right" action="{{ route('user.search') }}" method="GET">
                    <input class="form-control mr-sm-2 @error('keyword') is-invalid @enderror" type="search"
                        placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $number => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $number }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @empty
                    <td colspan="3">Records not found</td>
                @endforelse
            </tbody>
        </table>
        <span class="float-right">
            {{ $users->links() }}
        </span>
    </div>
@endsection
