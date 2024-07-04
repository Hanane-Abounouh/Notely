@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Mes Notes</h1>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="mb-4">
        <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Créer une nouvelle note
        </a>
    </div>
    
    @if ($notes->count())
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contenu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($notes as $note)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $note->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $note->category ? $note->category->name : 'Sans catégorie' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $note->content }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('notes.edit', $note) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($notes->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $notes->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($notes as $note)
                        @if ($note->url)
                            <li class="page-item"><a class="page-link" href="{{ $note->url }}">{{ $note->page }}</a></li>
                        @else
                            <li class="page-item active"><span class="page-link">{{ $note->page }}</span></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($notes->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $notes->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    @else
        <p class="text-gray-600">Aucune note trouvée.</p>
    @endif
</div>
@endsection

@section('styles')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a, .pagination li span {
        display: inline-block;
        padding: 8px 12px;
        color: #333;
        background-color: #fff;
        border: 1px solid #ddd;
        text-decoration: none;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #999;
        pointer-events: none;
        background-color: #f5f5f5;
        border-color: #ddd;
    }
</style>
@endsection
