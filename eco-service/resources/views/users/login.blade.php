@extends('./../admin/index')

@section('page-content')

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mb-6">
        <div class="card mb-3">
            <div class="card-body">

                @if(session()->has('error'))
                {{-- @foreach ($errors->all() as $error) --}}
                {{-- <div class="alert alert-info">{{ $error }}
            </div> --}}
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
            {{-- @endforeach --}}
            @endif

            <form action="{{route('login')}}" method="POST" class="form-product">
                @csrf
                <h4>Connectez-vous</h4>

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

                <button type="submit" class="btn btn-success mt-2">Connexion</button>
            </form>
            <p class="mt-1">
                Aucun compte ? <a href="{{ route('registration') }}">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</div>
<div class="col-md-4"></div>
</div>

@endsection