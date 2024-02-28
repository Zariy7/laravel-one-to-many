<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="type_id" class="form-label">Project Type:</label>
                        <select name="type_id" id="type_id">
                                @foreach($types_db as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Project Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                    <div>
                        <label for="title" class="form-label">Project Title:</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div>
                        <label for="desc" class="form-label">Project Description:</label>
                        <input type="text" name="desc" id="desc">
                    </div>
                    <div>
                        <label for="stack" class="form-label">Project Stack</label>
                        <input type="text" name="stack" id="stack">
                    </div>

                    <input type="submit" class="btn btn-sm btn-primary" value="Add!">
                </form>
            </div>
        </div>
    </div>
</body>