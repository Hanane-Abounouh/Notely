<style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
        }

        .pagination li a, .pagination li span {
            display: inline-block;
            width: 100%;
            height: 100%;
            color: #000;
            background-color: #ccc;
            border: 1px solid transparent;
            border-radius: 50%;
            text-decoration: none;
        }

        .pagination li.active span {
            background-color: #333;
            color: #fff;
        }

        .pagination li.disabled span {
            pointer-events: none;
            background-color: #ddd;
        }
    </style>
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Liste des Catégories</h1>
        
        @if ($categories->count())
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
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

            <div class="d-flex justify-content-center mt-4">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($categories->onFirstPage())
                                <li class="disabled"><span>&lsaquo;</span></li>
                            @else
                                <li><a href="{{ $categories->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                @if ($page == $categories->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($categories->hasMorePages())
                                <li><a href="{{ $categories->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
                            @else
                                <li class="disabled"><span>&rsaquo;</span></li>
                            @endif
                        </ul>
                    </div>
        @else
            <p class="text-gray-600">Aucune catégorie trouvée.</p>
        @endif
    </div>
@endsection
<script>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this category?');
        }
    </script>