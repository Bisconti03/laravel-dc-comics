@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col">
            <h2>
               {{ $comic->title }} 
            </h2>

        </div>
    </div>
    <div class="row g-3">

        
        <div class="col text-center">
            <div class="card h-100">
                <div class="card-body ">
                    <p>{{ $comic->price }}</p>
                    <p>{{ $comic->series }}</p>
                    <p>{{ $comic->description }}</p>
                    <p>{{ $comic->type }}</p>
                    <a href="{{ route('comics.index') }}" class="btn btn-primary">
                        Tutti i fumetti
                    </a>
                </div>
            </div>
        </div>
       
        
    </div>
</div>
@endsection