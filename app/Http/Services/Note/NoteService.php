<?php

namespace App\Http\Services\Note;

use App\Models\Note;

class NoteService
{
    public function index()
    {

        $search = request()->query('search');
        $order = request()->query('order', 'desc');
        if ($search) {
            return Note::search($search)->paginate(5);
        }

        return Note::orderBy('created_at', $order)->paginate(5);

    }
    public function store($data)
    {
        Note::create($data);
    }

    public function update(Note $note, $data)
    {
        $note->update($data);
    }
}

