@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Modifica Post: {{$post->title}}</h2>
                </div>

                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                          <label for="title">Titolo</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del post" value="{{old("title") ? old("title") : $post->title }}">
                          @error('title')
                             <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci il contenuto del post" rows="6">{{old("content") ? old("content") : $post->content}}</textarea>
                            @error('content')
                             <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                <option value="">Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                              </select>
                              @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                        </div>

                        <div class="form-group">
                            @if ($post->image)
                            <img id="uploadPreview" width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
                            @endif
                            <label for="image">Aggiungi immagine</label>
                            <input type="file" id="image" name="image" onchange="PreviewImage();">

                            <script type="text/javascript">

                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("image").files[0]);
                            
                                    oFReader.onload = function (oFREvent) {
                                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                                    };
                                };
                            
                            </script>


                            @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror 
                        </div>
                        
                        <div class="form-group form-check">
                            @php
                                $published = old("published") ? old("published") : $post->published;
                            @endphp
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{$published ? "checked" : ""}}>
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error('published')
                             <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </form>
                </div>
            </div>
            <a href="{{route('posts.index')}}" class="btn btn-primary mt-4">Torna ai posts</a>
        </div>
    </div>
</div>
@endsection