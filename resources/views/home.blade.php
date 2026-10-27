<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $appName }}</title>
</head>
<body>
    <h1>{{ $appName }}</h1>
    <p>{{ $description }}</p>

    <h2>Add Employee</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div>
            <label for="first_name">First Name</label>
            <input
                type="text"
                id="first_name"
                name="first_name"
                value="{{ old('first_name') }}"
                required
            >
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <input
                type="text"
                id="last_name"
                name="last_name"
                value="{{ old('last_name') }}"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div>
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
            >
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="">Select a role</option>
                <option value="Manager">Manager</option>
                <option value="Chef">Chef</option>
                <option value="Cashier">Cashier</option>
                <option value="Waiter">Waiter</option>
            </select>
        </div>

        <button type="submit">Add Employee</button>
    </form>

    <h2>Our Employees ({{ $employeeCount }})</h2>

    @if ($employees->isEmpty())
        <p>No employees have been added yet.</p>
    @else
        <ul>
            @foreach ($employees as $employee)
                <li>
                    {{ $employee->first_name }}
                    {{ $employee->last_name }}
                    — {{ $employee->role }}
                    — {{ $employee->email }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
