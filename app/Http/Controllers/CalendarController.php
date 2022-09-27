<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Habit;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {

        $event = new Event();
        $event->title = $request->name;
        $event->start = date('Y-m-d H:i:s', strtotime($request->start));
        $event->end =  date('Y-m-d H:i:s', strtotime($request->end));
        $event->habit_id = $request->habit_id;
        $event->user_id = 1;
        $event->allDay = false;

        $event->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $event->title = $request->name;
        $event->start = date('Y-m-d H:i:s', strtotime($request->start));
        $event->end =  date('Y-m-d H:i:s', strtotime($request->end));
        $event->habit_id = $request->habit_id;
        $event->user_id = 1;
        $event->allDay = false;

        $event->save();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHabitEvents(Request $request, $id) {

       $events = Event::select(['id','title','start','end','allDay', 'habit_id'])->where(['habit_id' => $id])->get();

        return response()->json(
             $events
        , 200
        );
    }
}
