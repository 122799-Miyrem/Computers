@extends('layout')

@section('content')

<style>
    /* Reset default browser styles */
    body, h1, h2, h3, p, ul, li, table, th, td, button {
        margin: 0;
        padding: 0;
        border: 0;
        font-family: Arial, sans-serif;
        font-size: 16px;
    }

    body {
        background-color: #f0f0f0;
        color: #333;
    }

    header {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    .btn-add, .btn-edit, .btn-delete, .btn-profile, .btn-logout, .logout-btn, .profile-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 5px;
        transition: background-color 0.3s;
        text-decoration: none;
    }

    .btn-add:hover, .btn-edit:hover, .btn-profile:hover, .btn-logout:hover, .logout-btn:hover, .profile-btn:hover {
        background-color: #0056b3;
    }

    .btn-delete:hover{
        background-color: #9B0000;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
    }

    .btn-edit, .btn-delete {
        margin-left: 5px;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-delete {
        background-color: #dc3545;
    }
</style>

<header>
    <div class="header-title">Computer Database</div>
    <div class="header-buttons">
        <a href="{{ route('profile.edit') }}" class="profile-btn">Profile</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <div class="card">
        <h2>Database</h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Processor</th>
                    <th>RAM</th>
                    <th>Graphics Card</th>
                    <th>Storage</th>
                    <th>Operating System</th>
                    <th>Screen Size</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($computerss as $computers)
                <tr>
                    <td>{{ $computers->id }}</td>
                    <td>{{ $computers->brand }}</td>
                    <td>{{ $computers->model }}</td>
                    <td>{{ $computers->processor }}</td>
                    <td>{{ $computers->ram }}</td>
                    <td>{{ $computers->graphics_card }}</td>
                    <td>{{ $computers->storage }}</td>
                    <td>{{ $computers->operating_system }}</td>
                    <td>{{ $computers->screen_size }}</td>
                    <td>{{ $computers->price }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('computerss.edit', $computers->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('computerss.destroy', $computers->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $computerss->links() }}
    </div>

    <div>
        <a href="{{ route('computerss.create')}}" class="btn btn-add">Add New Entry</a>
    </div>
</div>

@endsection
