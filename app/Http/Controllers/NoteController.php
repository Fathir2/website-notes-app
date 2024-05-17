<?php

namespace App\Http\Controllers;

use App\Models\Note;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;



use Illuminate\Http\Request;

class NoteController extends Controller
{
    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $notes = Note::latest()->paginate(5);

        //render view with posts
        return view('notes.index', compact('notes'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('notes.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'body'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/notes', $image->hashName());

        //create post
        Note::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'body'   => $request->body
        ]);

        //redirect to index
        return redirect()->route('notes.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $note = Note::findOrFail($id);

        //render view with post
        return view('notes.show', compact('note'));
    }
}
