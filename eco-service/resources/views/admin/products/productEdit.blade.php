@extends('admin.index')

@section('page-content')
    <div class="container">
        <h1>Modifier le produit</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom du produit</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ $product->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $product->quantity }}"
                    required>
            </div>
            <div class="form-group m-2">
                <label for="image">Image du produit</label>
                <input type="file" name="image" class="form-control-file" id="image">
                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100"
                        class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-primary m-2">Mettre à jour le produit</button>
        </form>
    </div>
@endsection
