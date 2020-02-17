@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12" style="text-align: left">
        <h2>Notifications</h2>
        <table class="table" style="margin: 30px 0">
            <tr>
                <th>Title</th>
                <th style="text-align: center">Views</th>
                <th style="text-align: center">Created</th>
                <th style="text-align: center">Manage</th>
            </tr>
            @foreach($notifications as $notification)

                <tr>
                    <td>
                        {{ $notification->title }}
                    </td>
                    <td style="text-align: center">
                        {{ (int)$notification->views }}
                    </td>
                    <td style="text-align: center">
                        {{ date('d.m.Y', strtotime($notification->created_at)) }}
                    </td>
                    <td style="text-align: center">

                        <form action="{{ route('notifications.destroy',$notification->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('notifications.show',$notification->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('notifications.edit',$notification->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('notifications.create') }}" class="btn btn-success">Add notification</a>
    </div>
</div>


@endsection
