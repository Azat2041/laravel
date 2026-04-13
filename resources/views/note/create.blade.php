@extends('layout.main')
@section('title', 'Новая заметка')
@section('subtitle', 'Сохрани идею, пока она свежая.')
@section('actions')
    <a class="btn btn-outline-secondary" href="{{route('notes.index')}}">К списку</a>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card note-card">
                <div class="card-body p-4 p-lg-5">
                    <form action="{{route('notes.store')}}" method="post" class="stack gap-4">
                        @csrf
                        <div>
                            <label for="title" class="form-label">Название</label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Например: Идеи для нового проекта">
                        </div>
                        <div>
                            <label for="content" class="form-label">Содержание</label>
                            <textarea id="content" name="content" rows="6" class="form-control" placeholder="Опиши мысль или заметку..."></textarea>
                        </div>
                        <div>
                            <label for="author" class="form-label">Автор</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Твоё имя">
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Создать</button>
                            <a class="btn btn-outline-secondary" href="{{route('notes.index')}}">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
