<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary p-4 text-white text-center">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="card-body mt-14">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                            <div class="text-center mt-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .container {
        margin-top: 30px;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #d82a4e;
        
        color: white;
    }
    .btn-primary {
      
        border-color: #d82a4e;
    }
    .btn-primary:hover {
      
        border-color: #c72d45;
    }
    .form-label {
        color: #495057; /* Label color */
        font-weight: bold; /* Bold label */
    }
    .form-control {
        border: 1px solid #ced4da; /* Gray border */
        border-radius: 0; /* Remove border radius */
    }
</style>
