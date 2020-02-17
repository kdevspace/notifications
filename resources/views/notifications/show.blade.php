@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12" style="display: flex; flex-direction: column; text-align: left;">
            <h2>View notification #{{ $notification->id }}</h2>
            <br>
            <h3>
                Title: {{ $notification->title }}
            </h3>
            <br>
            <div>
                Description: {{ $notification->description }}
            </div>
            <br>
            <div>
                Views: {{ (int)$notification->views }}
            </div>
            <br>
            <div>
                Created: {{ date('d.m.Y', strtotime($notification->created_at)) }}
            </div>
            <br>
            <div>
                <form action="{{ route('notifications.destroy',$notification->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('notifications.index',$notification->id) }}">Back</a>

                    <a class="btn btn-primary" href="{{ route('notifications.edit',$notification->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
