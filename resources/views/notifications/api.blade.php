
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
