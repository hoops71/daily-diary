@extends('template')
@section('content')
@include('_includes.formcheck')
<div class="container">
    <h1>New Post</h1>
    <hr />
    <form action="{{  route('diary.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"/>
        <label for="content">Content</label>
        <br />
        <textarea class="form-control" name="content" " id="content" rows="10" style="min-width: 100%" >{{ Request::old('content') }}</textarea><br />
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

@endsection