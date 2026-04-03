@extends('layouts.app')

@section('content')
<h1>Редактировать задачу</h1>
<form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Статус</label>
        <select class="form-select" name="status" id="status" required>
            <option value="Новая" {{ old('status', $task->status) == 'Новая' ? 'selected' : '' }}>Новая</option>
            <option value="В работе" {{ old('status', $task->status) == 'В работе' ? 'selected' : '' }}>В работе</option>
            <option value="Выполнена" {{ old('status', $task->status) == 'Выполнена' ? 'selected' : '' }}>Выполнена</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Обновить</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
</form>
@endsection