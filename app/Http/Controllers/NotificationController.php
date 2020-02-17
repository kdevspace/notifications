<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{
    /**
     * Notifications listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::latest()->paginate(5);

        return view('notifications.index', compact('notifications'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function api()
    {
        return response(Notification::all()->jsonSerialize());
    }

    /**
     * Show the form for creating a new notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')
            ->with('success','Notification created successfully.');
    }

    /**
     * Store a newly created notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function addView(Request $request, Notification $notification)
    {

        dd($request);

        $notification->update($request->all());
    }

    /**
     * Display the specified notification.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        return view('notifications.show',compact('notification'));
    }

    /**
     * Show the form for editing the specified notification.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        return view('notifications.edit',compact('notification'));
    }

    /**
     * Update the specified notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')
            ->with('success','Notification updated successfully');
    }

    /**
     * Remove the specified notification.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')
            ->with('success','Notification deleted successfully');
    }
}
