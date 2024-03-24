@extends('layouts.main')

@section('title', 'Home')

@include('layouts.navbar')

@section('content')
    <div class="container">
        <h3>Welcome, {{ Auth::user()->name ?? 'User' }}!</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae impedit minus, repellendus, possimus
            officiis ut sequi recusandae ea unde porro quisquam mollitia beatae eaque nihil quis accusantium tenetur
            quibusdam earum ullam temporibus saepe distinctio quae non vel. A, sed consequatur eligendi tenetur vero
            veritatis dolor? Ullam temporibus tempora praesentium optio!</p>
    </div>
@endsection
