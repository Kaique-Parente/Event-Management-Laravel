<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendResource;
use App\Models\Attend;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        $attendees = $event->attendees()->paginate();
        return new AttendResource($attendees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        $attendee = $event->attendees()->create([
            'user_id' => 1
        ]);

        return new AttendResource($attendee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Attend $attendee)
    {
        return new AttendResource($attendee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Attend $attendee)
    {
        $attendee->delete();
        return response(status:204);
    }
}
