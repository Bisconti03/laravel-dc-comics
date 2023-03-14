@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">

            <h1>Crea un Fumetto</h1>

            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" name="title" id="title" required maxlength="255" placeholder="Inserisci un Titolo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Crea una descrizione</label>
                    <input type="text" class="form-control" name="description" id="description" required maxlength="255" placeholder="Inserisci una descrizione">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">€</span>
                    <input type="number" name="price" id="price" class="form-control" aria-label="Amount (to the nearest dollar)" required placeholder="Specifica il prezzo con due cifre dopo il . Es(7.99)">
                    
                  </div>

                <div class="mb-3">
                    <label for="series" class="form-label">Serie</label>
                    <input type="text" class="form-control" name="series" id="series" required maxlength="255" placeholder="Inserisci una Serie" required maxlength="64">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                        <option selected>Seleziona un tipo</option>
                        <option value="comic book">Comic book</option>
                        <option value="graphic novel">Graphic novel</option>
                      
                      </select>
                </div>

                

                <button type="submit" class="btn btn-success">
                    Salva
                </button>
            </form>

        </div>
    </div>
</div>
@endsection