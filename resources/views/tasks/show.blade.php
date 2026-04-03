@extends('layouts.app')

@section('content')
<h1>Просмотр задачи</h1>
<div class="mb-3"><strong>Название:</strong> {{ $task->title }}</div>
<div class="mb-3"><strong>Описание:</strong> {{ $task->description ?? '-' }}</div>
<div class="mb-3">
    <strong>Статус:</strong> 
    <span class="badge {{ $task->status == 'Новая' ? 'bg-primary' : ($task->status == 'В работе' ? 'bg-warning text-dark' : 'bg-success') }}">
        {{ $task->status }}
    </span>
</div>
<div class="mb-3"><strong>Создано:</strong> {{ $task->created_at->format('d.m.Y H:i') }}</div>
<div class="mb-3"><strong>Обновлено:</strong> {{ $task->updated_at->format('d.m.Y H:i') }}</div>
<a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Редактировать</a>
<a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад</a>
@endsection