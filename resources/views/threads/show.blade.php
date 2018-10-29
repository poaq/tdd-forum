@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href ="#">{{$thread->creator->name}}</a> posted
                        {{$thread->title}}</div>
                    <div class="card-body">
                    {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
              @if (auth()->check())
                <form method="POST" action="{{$thread->path().'/replies'}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Post your thoughs.." rows ="5">
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">New Post</button>
                </form>
              @endif
            </div>
        </div>
    </div>
@endsection