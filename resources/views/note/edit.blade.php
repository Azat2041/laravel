@extends('layout.main')
@section('title', 'Редактировать заметку')
@section('subtitle', 'Обнови детали и сохрани новую версию.')
@section('actions')
    <a class="btn btn-outline-secondary" href="{{route('notes.show', $note->id)}}">Назад к заметке</a>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card note-card">
                <div class="card-body p-4 p-lg-5">
                    <form action="{{route('notes.update', $note->id)}}" method="post" class="vstack gap-4">
                        @csrf
                        @method('patch')
                        <div>
                            <label for="title" class="form-label">Название</label>
                            <input value="{{old('title', $note->title)}}" type="text" class="form-control form-control-lg" id="title" name="title">
                        </div>
                        <div>
                            <label for="content" class="form-label">Содержание</label>
                            <textarea id="content" name="content" rows="6" class="form-control">{{old('content', $note->content)}}</textarea>
                            @error('content')
                            <p class="text-danger small mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="author" class="form-label">Автор</label>
                            <input value="{{old('author', $note->author)}}" type="text" class="form-control" id="author" name="author">
                            @error('author')
                            <p class="text-danger small mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                            <a class="btn btn-outline-secondary" href="{{route('notes.show', $note->id)}}">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
