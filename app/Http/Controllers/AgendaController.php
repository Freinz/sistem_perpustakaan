<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use Exception;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getEvents()
    {
        $events = Agenda::all();
        // $events = Agenda::where('user_id', auth()->user()->id)->get();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Agenda();
        $event->nama_kegiatan = $request->input('title');
        $event->start_date = $request->input('start');
        $event->end_date = $request->input('end');
        // $event->allDay = $request->input('allDay');
        $event->catatan = $request->input('description');
        $event->tempat_kegiatan = $request->input('venue');
        $event->pelaksana_kegiatan = $request->input('organizer');
        $event->kelengkapan_kegiatan = $request->input('equipment');
        $event->berkas_kegiatan = $request->input('documents');
        $event->jenis_kegiatan = $request->input('className');
        $event->user_id = auth()->user()->id;
        $event->save();
        // return response()->json(['success' => 'Event added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        \Log::info($request);
        try {
            $event = Agenda::find($request->input('id'));
            if ($event) {
                $event->nama_kegiatan = $request->input('title');
                $event->start_date = $request->input('start');
                $event->end_date = $request->input('end');
                $event->catatan = $request->input('description');
                $event->tempat_kegiatan = $request->input('venue');
                $event->pelaksana_kegiatan = $request->input('organizer');
                $event->kelengkapan_kegiatan = $request->input('equipment');
                $event->berkas_kegiatan = $request->input('documents');
                $event->jenis_kegiatan = $request->input('className');
                $event->update();

                // return response()->json(['success' => 'Event Berhasil Diperbarui!']);
            } else {
                return response()->json(['error' => 'Event not found'], 404);
            }
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'There was an error updating the event'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Agenda::find($id);

        if ($event) {
            // Hapus event
            $event->delete();
            return response()->json(['success' => 'Event deleted successfully!']);
        } else {
            return response()->json(['error' => 'Event not found!'], 404);
        }
    }
}
