@extends('layout')

@section('content')

<style>
    .uper {

        margin-top: 40px;

    }
</style>

<div class="card uper">

    <div class="card-header">

        Edit Computers Data

    </div>

    <div class="card-body">

        @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div><br />

        @endif

        <form method="post" action="{{ route('computerss.update', $computers->id) }}">
        @csrf
        @method('PUT')

            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" name="brand" value="{{ $computers->brand }}">
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" name="model" value="{{ $computers->model }}">
            </div>

            <div class="form-group">
                <label for="processor">Processor:</label>
                <input type="text" class="form-control" name="processor" value="{{ $computers->processor }}">
            </div>

            <div class="form-group">
                <label for="ram">RAM:</label>
                <input type="text" class="form-control" name="ram" value="{{ $computers->ram }}">
            </div>

            <div class="form-group">
                <label for="graphics_card">Graphics Card:</label>
                <input type="text" class="form-control" name="graphics_card" value="{{ $computers->graphics_card }}">
            </div>

            <div class="form-group">
                <label for="storage">Storage:</label>
                <input type="text" class="form-control" name="storage" value="{{ $computers->storage }}">
            </div>

            <div class="form-group">
                <label for="operating_system">Operating System:</label>
                <input type="text" class="form-control" name="operating_system" value="{{ $computers->operating_system }}">
            </div>

            <div class="form-group">
                <label for="screen_size">Screen Size:</label>
                <input type="text" class="form-control" name="screen_size" value="{{ $computers->screen_size }}">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value="{{ $computers->price }}">
            </div>

            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update?')">Update Data</button>

        </form>

    </div>

</div>

@endsection