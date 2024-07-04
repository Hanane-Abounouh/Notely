<!-- resources/views/notes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Modifier la note</h1>
    
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Titre</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded @error('title') border-red-500 @enderror" value="{{ old('title', $note->title) }}">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Contenu</label>
            <textarea name="content" id="content" rows="5" class="w-full p-2 border border-gray-300 rounded @error('content') border-red-500 @enderror">{{ old('content', $note->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Catégorie</label>
            <select name="category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded">
    <option value="">Sélectionner une catégorie</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id', $note->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
</select>

        </div>
        
        <div>
            <button type="submit" class="bg-[#4f4d4d] text-white px-4 py-2 rounded">Modifier</button>
        </div>
    </form>
</div>
@endsection
