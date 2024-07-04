

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="...">

<div class="d-flex flex-column flex-shrink-0 p-3 sidebar mt-6">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <strong class="fs-4 text-center-custom">📝 My Categories</strong>
    </a>
    <hr>
    <a href="{{ route('categories.create') }}" class="btn  mb-3 btn-block create-category-btn mt-6">
        <i class="fas fa-plus"></i> Create Category 
    </a>
    <ul class="nav nav-pills flex-column mb-auto mt-10">
        @isset($categories)
            @foreach($categories as $category)
                <li class="nav-item">
                    <a href="{{ route('categories.show', $category->id) }}" class="nav-link text-decoration-none">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        @endisset
    </ul>
    <hr>

  
</div>
