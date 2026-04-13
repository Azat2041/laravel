<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Http\Services\Note\NoteService;
use Illuminate\Http\Request;
use App\Models\Note;



class NoteController extends Controller
{
    public $noteService;

    public function __construct(NoteService $service)
    {
        $this->noteService = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $notes = $this->noteService->index();
        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->noteService->store($data);
        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Note $note,  UpdateRequest $request)
    {
        $data = $request->validated();

        $this->noteService->update($note, $data);
        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}
