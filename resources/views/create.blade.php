@extends('layout')

@section('content')

<style>
    .uper {

        margin-top: 40px;

    }
</style>

<div class="card uper">

    <div class="card-header">

        Add Computers Data

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

        <form method="post" action="{{ route('computerss.store') }}">



            <div class="form-group">
                @csrf
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" name="brand">
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" name="model">
            </div>

            <div class="form-group">
                <label for="processor">Processor:</label>
                <input type="text" class="form-control" name="processor">
            </div>

            <div class="form-group">
                <label for="ram">RAM:</label>
                <input type="text" class="form-control" name="ram">
            </div>

            <div class="form-group">
                <label for="graphics_card">Graphics Card:</label>
                <input type="text" class="form-control" name="graphics_card">
            </div>

            <div class="form-group">
                <label for="storage">Storage:</label>
                <input type="text" class="form-control" name="storage">
            </div>

            <div class="form-group">
                <label for="operating_system">Operating System:</label>
                <input type="text" class="form-control" name="operating_system">
            </div>

            <div class="form-group">
                <label for="screen_size">Screen Size:</label>
                <input type="text" class="form-control" name="screen_size">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price">
            </div>


            <button type="submit" class="btn btn-primary" onclick="return confirm('You have successfuly added a computer!')">Add Computers</button>
        </form>

    </div>

</div>

@endsection