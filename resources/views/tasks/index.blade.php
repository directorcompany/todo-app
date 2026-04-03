@extends('layouts.app')

@section('content')
<h1>Список задач</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Добавить задачу
</a>

<!-- Форма поиска и фильтра -->
<form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Поиск..." value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <select name="status" class="form-select">
            <option value="">Все статусы</option>
            <option value="Новая" {{ request('status') == 'Новая' ? 'selected' : '' }}>Новая</option>
            <option value="В работе" {{ request('status') == 'В работе' ? 'selected' : '' }}>В работе</option>
            <option value="Выполнена" {{ request('status') == 'Выполнена' ? 'selected' : '' }}>Выполнена</option>
        </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-secondary"><i class="bi bi-funnel"></i> Фильтр</button>
    </div>
</form>

<!-- Таблица задач -->
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Название</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
            <tr>
                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>

                <!-- Статус с цветными метками и AJAX -->
                <td>
                    <select class="form-select form-select-sm status-dropdown" data-task-id="{{ $task->id }}">
                        <option value="Новая" data-color="primary" {{ $task->status == 'Новая' ? 'selected' : '' }}>Новая</option>
                        <option value="В работе" data-color="warning" {{ $task->status == 'В работе' ? 'selected' : '' }}>В работе</option>
                        <option value="Выполнена" data-color="success" {{ $task->status == 'Выполнена' ? 'selected' : '' }}>Выполнена</option>
                    </select>
                </td>

                <!-- Действия -->
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Вы уверены, что хотите удалить задачу?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Пагинация -->
{{ $tasks->links('pagination::bootstrap-5') }}

@endsection

@push('scripts')
<script>
document.querySelectorAll('.status-dropdown').forEach(function(select) {

    // функция для обновления цвета селекта
    function updateSelectColor(el) {
        const colorClassMap = {
            'primary': 'bg-primary text-white',
            'warning': 'bg-warning text-dark',
            'success': 'bg-success text-white'
        };
        const selectedOption = el.options[el.selectedIndex];
        const color = selectedOption.dataset.color;
        el.className = 'form-select form-select-sm ' + (colorClassMap[color] || '');
    }

    // применяем цвет сразу при загрузке страницы
    updateSelectColor(select);

    // обработчик изменения статуса
    select.addEventListener('change', function() {
        const taskId = this.dataset.taskId;
        const status = this.value;

        // обновляем цвет селекта
        updateSelectColor(this);

        // AJAX запрос на сервер
        fetch(`/tasks/${taskId}/status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                console.log('Статус обновлен на: ' + data.status);
            } else {
                alert('Ошибка обновления статуса');
            }
        })
        .catch(() => alert('Ошибка обновления статуса'));
    });
});
</script>
@endpush