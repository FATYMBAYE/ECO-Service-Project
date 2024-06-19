@extends('admin.index')

@section('page-content')
    <div class="container">
        <h1>Ajouter un produit</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom du produit</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}"
                    required>
            </div>
            <div class="form-group m-2">
                <label for="image">Image du produit</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <button type="submit" class="btn btn-primary m-2">Ajouter le produit</button>
        </form>

        <h2 class="mt-5">Liste des produits</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}€</td>
                        <td>{{ $product->quantity }} </td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                    width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
