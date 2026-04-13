@extends('layout.main')
@section('title', 'Все заметки')
@section('subtitle', 'Держи фокус на важных идеях и быстрых черновиках.')
@section('actions')
    <a class="btn btn-primary btn-lg shadow-sm" href="{{route('notes.create')}}">Создать заметку</a>
@endsection
@section('content')
    <div class="row g-4">
        @foreach($notes as $note)
            <div class="col-12 col-md-6 col-xl-4">
                <article class="card note-card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge badge-soft">#{{$note->id}}</span>
                            <span class="text-muted small">{{ $note->created_at->format('d.m.Y') }}</span>
                        </div>
                        <h5 class="card-title mb-2">
                            <a class="stretched-link text-decoration-none text-dark" href="{{route('notes.show', $note->id)}}">
                                {{$note->title}}
                            </a>
                        </h5>
                        <p class="card-text text-muted flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($note->content, 140) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle">{{ mb_substr($note->author ?? 'N', 0, 1) }}</div>
                                <span class="small text-muted">{{$note->author}}</span>
                            </div>
                            <span class="small text-muted">{{ $note->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{$notes->appends(request()->query())->links()}}
    </div>
@endsection
