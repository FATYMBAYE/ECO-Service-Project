@extends('./../admin/index')

@section('page-content')

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mb-6">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{route('registration')}}" method="POST" class="form-product">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @csrf
                    <h4>Nouvel administrateur</h4>
                    <div class="form-group">
                        <label for="">Nom de l'administrateur</label>
                        <input type="text" class="form-control mt-1" placeholder="Nom" name="nom" value={{old('nom')}}>
                        @error('nom')
                        <div class="text text-danger ">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control mt-1" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text text-danger ">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password" class="form-control mt-1" name="password">
                        @error('password')
                        <div class="text text-danger mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Inscription</button>
                </form>
                <p>
                    Avez-vous déja un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

@endsection