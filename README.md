<img width="1918" height="800" alt="todo" src="https://github.com/user-attachments/assets/3a7cc9df-258f-4cff-be30-de6173bd35aa" />

````markdown

# 📝 Laravel Todo App

Тестовое задание для позиции **Junior Laravel Developer**.  
Приложение представляет собой простой CRUD для управления задачами с улучшенным интерфейсом.

---

## 🚀 Функционал

### Основной функционал
- 📋 Просмотр списка задач  
- ➕ Создание новой задачи  
- ✏️ Редактирование задачи  
- ❌ Удаление задачи  
- 🔍 Просмотр одной задачи  

### Работа со статусами
- Новая  
- В работе  
- Выполнена  

---

## ⚡ Дополнительные возможности

- 🔎 Поиск задач по названию  
- 🎯 Фильтрация по статусу  
- 📄 Пагинация (10 задач на страницу)  
- 🔄 AJAX обновление статуса без перезагрузки  
- 🎨 Цветовая индикация статусов  

---

## 🛠 Используемые технологии

- PHP 8+  
- Laravel 10+  
- Blade Templates  
- Bootstrap 5  
- JavaScript (Fetch API / AJAX)  

---

## 📦 Установка и запуск

### 1. Клонирование репозитория

```bash
git clone https://github.com/YOUR_USERNAME/laravel-todo-app.git
cd laravel-todo-app
````

### 2. Установка зависимостей

```bash
composer install
```

### 3. Настройка окружения

```bash
cp .env.example .env
php artisan key:generate
```

Настройте подключение к базе данных в `.env`:

```dotenv
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_password
```

### 4. Миграции и заполнение базы

```bash
php artisan migrate --seed
```

### 5. Запуск проекта

```bash
php artisan serve
```

Открыть в браузере: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📁 Структура проекта

```
app/
  Http/Controllers/TaskController.php
  Models/Task.php

database/
  migrations/
  seeders/

resources/views/
  layouts/
  tasks/

routes/
  web.php
```

---

## 🎨 Статусы задач

| Статус    | Цвет       |
| --------- | ---------- |
| Новая     | 🔵 Синий   |
| В работе  | 🟡 Жёлтый  |
| Выполнена | 🟢 Зелёный |

---

## 📌 Особенности реализации

* Реализован полный CRUD
* Используется серверная валидация Laravel
* Реализован AJAX для обновления статуса
* Удобный и понятный интерфейс
* Используется Bootstrap для стилизации

---

## 👨‍💻 Автор

Выполнено в рамках тестового задания на позицию Junior Laravel Developer.

---

## 📄 Лицензия

MIT

```
