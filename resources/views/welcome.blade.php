@extends('template')
@section('content')


  <div class="container">
    <div class="mt-4 p-5 bg-primary text-white rounded ">
        <h1 class="text-center">Welcome to My Diary</h1>
        @if (Auth::guest())
          <p class="text-center">Login or Register</p>
        @else
          <p class="text-center">Hello {{ Auth::user()->name }}</p>
        @endif
    </div>
</div>
@endsection