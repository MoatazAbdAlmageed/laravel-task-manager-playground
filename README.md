# Task Manager Playground

A modern task management application built with the Laravel TALL stack + Filament.

## Tech Stack

- **PHP**: 8.5.1
- **Laravel**: 12.0
- **Filament**: v5 (Panel Builder)
- **Livewire**: v4
- **Volt**: v1
- **Tailwind CSS**: v3
- **Pest**: v4 (Testing Framework)
- **RabbitMQ**: Message Broker (via `laravel-queue-rabbitmq`)

## Requirements

### RabbitMQ

RabbitMQ must be installed and running on your system.

- **Windows**: Use [RabbitMQ Windows Installer](https://www.rabbitmq.com/install-windows.html) or run via Docker.
- **Mac/Linux**: Install via Homebrew or standard package managers.
- Ensure the management plugin is enabled if you want to inspect queues: `rabbitmq-plugins enable rabbitmq_management`.

## Setup

1. **Clone the repository**:

   ```bash
   git clone <repository-url>
   cd laravel-task-manager-playground
   ```

2. **Run the setup script**:

   ```bash
   composer run setup
   ```

   This script will:
   - Install PHP and JS dependencies
   - Copy `.env.example` to `.env`
   - Generate application key
   - Run database migrations
   - Build frontend assets

3. **Start the development server**:

   ```bash
   npm run dev
   ```

4. **Listen to the queue**:

   ```bash
   php artisan queue:listen
   ```

## Useful Links

- **Admin Panel**: [https://playground.test/admin](https://playground.test/admin)
- **API Documentation (Swagger)**: [https://playground.test/docs/api#/](https://playground.test/docs/api#/)

## Key Features

- **Filament Panel**: Managed tasks at `/admin/tasks`.
- **Livewire Components**: Reactive UI components for task interaction.
- **Asynchronous Processing**: Tasks are dispatched to RabbitMQ for processing via `ProcessTask` job.
- **DTO Pattern**: Using `TaskData` for type-safe data transfer.
- **Service Layer**: Business logic encapsulated in `TaskService`.

## Testing

Run the test suite using Pest:

```bash
php artisan test --compact
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
