@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-3">Modifica categoria {{$category->name}}</h1>

        <form action="{{route('categories.update', $category->id)}}" method="POST" class="mb-5">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Aggiungi nome" value="{{old('name', $category->name)}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifica categoria</button>

        </form>

        <a href="{{route('categories.index')}}"><button type="button" class="btn btn-dark">Lista Categorie</button></a>
    </div>
@endsection