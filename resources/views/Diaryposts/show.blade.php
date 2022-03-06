@extends('template')
@section('content')
@include('_includes.formcheck')

<div class="container">
    <form action="{{  route('diary.update',['diary'=>$diarypost->id]) }}" method="POST" id="updateForm">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $diarypost->title }}"/>
        <label for="content">Content</label>
        <br />
        <textarea class="form-control" name="content" id="content" rows="10" style="min-width: 100%">{{ $diarypost->content }}</textarea><br />
        <input type="submit" class="btn btn-primary" value="Save changes">
    </form>
</div>

@endsection