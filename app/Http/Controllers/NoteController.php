<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index', ['notes' => Note::all()]);
    }

    public function create()
    {
        return view('notes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'nullable',
            'content'=>'required|max:10000'
        ]);
        // $note = new Note;
        // $note->title = $request->title;
        // $note->content = $request->content;
        // $note->save();
        Note::create($request->input());
        return redirect()->route('notes.index');
    }


    public function show(Note $note)
    {
        // $note = Note::where('id', $id)->where('title', $title)->get();
        // $note = Note::findOrFail($id);

        // // return view('notes.show', ['note' => $note]);
        return view('notes.show', compact('note'));
    }


    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));   
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title'=>'nullable',
            'content'=>'required|max:10000'
        ]);
        $note->update($request->all());
        return redirect()->route('notes.index', $note);
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

    public function delete(Note $note)
    {
        return view('notes.delete', compact('note'));
    }

}
