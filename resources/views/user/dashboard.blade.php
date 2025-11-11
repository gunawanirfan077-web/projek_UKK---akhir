@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')
<div class="container text-center mt-5">
  <img src="{{ asset('img/g.jpeg') }}" 
       alt="Gambar Dashboard" 
       class="rounded shadow"
       style="width: 700px; height: 700px; object-fit: cover; border-radius: 15px;">
</div>
@endsection
