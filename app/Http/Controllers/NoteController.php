<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Category;

class NoteController extends Controller
{
    /**
     * Affiche une liste paginée des notes de l'utilisateur authentifié.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    
    {
        $notes = Note::where('user_id', Auth::id())->paginate(3);
        return view('notes.index', compact('notes'));
    }
    

    /**
     * Affiche le formulaire de création de nouvelle note avec les catégories de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.create', compact('categories'));
    }

    /**
     * Stocke une nouvelle note dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->category_id = $request->category_id;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    /**
     * Affiche le formulaire d'édition d'une note spécifique.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\View\View
     */
    public function edit(Note $note)
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.edit', compact('note', 'categories'));
    }

    /**
     * Met à jour une note spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note->update($request->only(['title', 'content', 'category_id']));

        return redirect()->route('notes.index')->with('success', 'Note updated successfully');
    }

    /**
     * Supprime une note spécifique de la base de données.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\RedirectResponse
     */
    // app/Http/Controllers/NoteController.php

public function destroy(Note $note)
{
    $this->authorize('delete', $note); // Vérifie l'autorisation de supprimer la note

    $note->delete();
    return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
}

}
