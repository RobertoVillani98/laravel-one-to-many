@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $post->title }}</h2>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Stato:</strong>
                        @if ($post->published)
                            <span class="badge badge-success">Pubblicato</span>
                        @else
                            <span class="badge badge-secondary">Bozza</span>
                        @endif
                    </div>
                    {{ $post->content }}
                </div>
            </div>
            <div class="d-flex mt-3">
                <a href="{{route('posts.edit', $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mx-3" onclick="return confirm('Sei sicuro di voler eliminare il post?')">Elimina</button>
                 <a href="{{route('posts.index')}}" class="btn btn-primary">Torna ai posts</a>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection