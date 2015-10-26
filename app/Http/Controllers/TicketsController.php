<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TicketFormRequest $request)
    {
      //  return $request->all();
        $ticket = new Ticket(array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'country' => $request->get('country'),
            'gender' => $request->get('gender'),
            'job' => $request->get('job'),

        ));

        $ticket->save();

        return redirect('/contact')->with('status', 'Your contact has been created! Its unique id is: ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $ticket = Ticket::whereid($id)->firstOrFail();
        return view('Tickets.show', compact('ticket'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $ticket = Ticket::whereid($id)->firstOrFail();
        return view('Tickets.edit', compact('ticket'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, TicketFormRequest $request)
    {
        $ticket = Ticket::whereid($id)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');

        $ticket->save();
        return redirect(action('TicketsController@edit', $ticket->id))->with('status', 'The ticket has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::whereid($id)->firstOrFail();
        $ticket->delete();
        return redirect('/tickets')->with('status', 'The ticket has been deleted!');
    }
}
