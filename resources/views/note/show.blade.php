@extends('layout.main')
@section('title', $note->title)
@section('subtitle', 'Детали заметки и управление записью.')
@section('actions')
    <a class="btn btn-outline-secondary" href="{{route('notes.index')}}">К списку</a>
    <a class="btn btn-primary" href="{{route('notes.edit', $note->id)}}">Редактировать</a>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="card note-card">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <span class="badge badge-soft">#{{$note->id}}</span>
                        <span class="text-muted small">Создано {{ $note->created_at->format('d.m.Y') }} в {{ $note->created_at->format('H:i') }}</span>
                    </div>
                    <h2 class="mb-3">{{$note->title}}</h2>
                    <p class="lead text-muted">{!! nl2br(e($note->content)) !!}</p>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="avatar-circle">{{ mb_substr($note->author ?? 'N', 0, 1) }}</div>
                        <div>
                            <div class="fw-semibold">{{$note->author}}</div>
                            <div class="text-muted small">Автор заметки</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 px-4 px-lg-5 pb-4">
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-primary" href="{{route('notes.edit', $note->id)}}">Изменить</a>
                        <form action="{{route('notes.destroy', $note->id)}}" method="post" onsubmit="return confirm('Удалить заметку?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
