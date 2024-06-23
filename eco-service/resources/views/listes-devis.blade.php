@extends('./admin.index')

@section('page-content')

<h1 class="text-center mb-6">Liste de ceux qui nous ont contactés pour demande de devis</h1><br>
<div class="container">
    <table class="table table-bordered mx-auto">
        <thead>
            <tr>
                <th class="px-4 text-center">Nom de l'entreprise</th>
                <th class="px-4 text-center">Mail</th>
                <th class="px-4 text-center">Services souhaités</th>
                <th class="px-4 text-center">Messages</th>
                <th class="px-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotes as $quote)
            <tr>
                <td class="text-center">{{ $quote->nom }}</td>
                <td class="text-center">{{ $quote->mail }}</td>
                <td class="text-center">{{ $quote->service }}</td>
                <td class="text-center">{{ $quote->message }}</td>
                <td class="text-center">
                    <div class="btn btn-group">
                        <form method="GET" action="{{ route('quote.delete', $quote->idContact) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection