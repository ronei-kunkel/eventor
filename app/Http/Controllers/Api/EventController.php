<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promoter;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    private $event;

    public function __construct(Event $event) {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Promoter $promoter
     * @return \Illuminate\Http\Response
     */
    public function index(Promoter $promoter)
    {
        // if the events are requested from any promoter, return the promoter events.
        // otherwise, return all events of all promoters
        return ($promoter->exists) ? $promoter->events() : $this->event->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['promoter_id'] = $request->promoter;

        return $this->event->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  Promoter  $promoter
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Promoter $promoter, Event $event)
    {
        return $promoter->events()->find($event->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Promoter  $promoter
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promoter $promoter, Event $event)
    {
        $promoter->events()->find($event->id)->update($request->all());

        return $promoter->events()->find($event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Promoter  $promoter
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promoter $promoter, Event $event)
    {
        return $promoter->events()->find($event->id)->delete();
    }
}
