@extends('template')
@section('content')
<div class="container">
    <h1>All Posts</h1>
        <hr />
            @foreach ($diaryposts as $apost )
            @if ($apost->user_id == Auth::user()->id )
            <div class="card">
                <div class="card-body">
                    <h3 class="card-header">{{ $apost->title }}</h3>
                    <p>{{ $apost->content }}</p>
                    <p>Last edited: {{ $apost->updated_at->diffForHumans() }}</p>
                    <a href="{{ route('diary.show', $apost->id) }}" id="show" class="btn btn-primary btn-sm">View</a>
                    <a class="btn btn-danger btn-sm" href="#" id="delete" onclick="if(!confirm('Are you sure you want to delete the post?')) return event.preventDefault();
                     document.getElementById(
                          'delete-form-{{ $apost->id }}').submit();" >
                          Delete
                    </a>
                    <form id="delete-form-{{ $apost->id}}"  action="{{ route('diary.destroy',  $apost->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                    </form> 
                </div>
            </div>  
        @endif
        @endforeach
    {{ $diaryposts->links() }}
</div>
    
    

@endsection