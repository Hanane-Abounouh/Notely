<style>
    /* Style pour la barre latérale */
    .sidebar {
        background-color: #f8f9fa;
        border-right: 1px solid #e9ecef;
        min-width: 250px; /* Ajustez la largeur selon vos besoins */
        padding: 15px;
    }

    /* Style pour le titre "My Categories" */
    .sidebar-title {
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Style pour les liens de catégorie */
    .sidebar-category-link {
        display: block;
        padding: 10px 15px;
        color: #495057;
        font-size: 1rem;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar-category-link:hover {
        background-color: #e9ecef;
        color: #333;
    }

    /* Style pour l'icône de catégorie */
    .sidebar-category-icon {
        margin-right: 10px;
    }

    /* Style pour le bouton "Create Category" */
    .create-category-btn {
        background-color: #d82a4e;
        color: #fff;
        border: none;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: block;
        width: 100%;
        margin-bottom: 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .create-category-btn:hover {
        background-color: #d82a4e;
        color: #fff;
    }
</style>

<div class="d-flex flex-column flex-shrink-0 p-3 sidebar mt-6">
    <a href="/" class="sidebar-title text-decoration-none">
        📝 My Categories
    </a>
    <hr>
    <a href="{{ route('categories.create') }}" class="create-category-btn">
        <i class="fas fa-plus"></i> Create Category
    </a>
    <ul class="nav flex-column mb-auto mt-3">
        @isset($categories)
            @foreach($categories as $category)
                <li class="nav-item">
                    <a href="{{ route('categories.show', $category->id) }}" class="sidebar-category-link">
                        <i class="fas fa-folder sidebar-category-icon"></i>{{ $category->name }}
                    </a>
                </li>
            @endforeach
        @endisset
    </ul>
    <hr>
</div>
