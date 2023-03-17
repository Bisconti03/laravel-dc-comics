@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">

            <h1>Modifica il prodotto {{ $comic->id }}</h1>

            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Torna indietro
            </a>

            @if ($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                
            @endif
            
            <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" name="title" id="title" required maxlength="255" value="{{old('title', $comic->title) }}" placeholder="Inserisci un Titolo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Crea una descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Crea una descrizione">{{old('description', $comic->description) }}</textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">€</span>
                    <input type="number" name="price" id="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('price', $comic->price) }}" required placeholder="Specifica il prezzo con due cifre dopo il . Es(7.99)">
                    
                  </div>

                <div class="mb-3">
                    <label for="series" class="form-label">Serie</label>
                    <input type="text" class="form-control" name="series" id="series" required maxlength="255"  value="{{old('series', $comic->series) }}" placeholder="Inserisci una Serie" required maxlength="64">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                        <option {{ !isset($comic->type) ? 'selected' : '' }}>Seleziona un tipo</option>
                        <option value="comic book" {{ $comic->type == 'comic book' ? 'selected' : '' }}>Comic book</option>
                        <option value="graphic novel" {{ $comic->type == 'graphic novel' ? 'selected' : '' }}>Graphic novel</option>
                      
                      </select>
                </div>

                

                <button type="submit" class="btn btn-warning">
                    Aggiorna
                </button>
            </form>

        </div>
    </div>
</div>
@endsection