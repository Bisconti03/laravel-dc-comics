@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-12">
            <h1>Tutti i fumetti</h1>
            <a href="{{ route('comics.create') }}" class="btn btn-danger">
                Crea un fumetto
            </a>
        </div>
        @foreach ($comics as $comic)
        <div class="col text-center">
            
            <div class="card h-100">
                <div class="card-body ">
                    <h3 class="card-title">{{ $comic->title }}</h3>
                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">
                        Dettagli
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection