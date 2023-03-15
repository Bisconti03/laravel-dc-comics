@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-12">
            <h1>Tutti i fumetti</h1>
            <a href="{{ route('comics.create') }}" class="btn btn-success">
                Crea un fumetto
            </a>
        </div>

        
        @foreach ($comics as $comic)
        <div class="col-3 text-center">
            
            <div class="card h-100">
                <div class="card-body ">
                    <h3 class="card-title">{{ $comic->title }}</h3>
                    <p>{{ $comic->price }}</p>
                    <p>{{ $comic->series }}</p>
                    <p>{{ $comic->type }}</p>
                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary m-2">
                        Dettagli
                    </a>
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning m-2">
                        Aggiorna
                    </a>
                    <form
                        action="{{ route('comics.destroy', $comic->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection