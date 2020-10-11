<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    {{-- bootstrap css CDN --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- bootstrap js CDN --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List App</title>
</head>
<body>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <h1>Todo List</h1>
            </div>

            {{-- display success message --}}
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>
            @endif

            {{-- display error message --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <div class="row">
                <form action="{{ route('tasks.update', [$taskUnderEdit->id]) }}" method = 'POST'>
                {{ csrf_field() }}
                    <input type="hidden", name= '_method' value = 'PUT'>
                    <div class="form-group">
                        <input type="text" name = 'updatedTaskName' class = 'form-control input-lg' value='{{ $taskUnderEdit->name }}'>
                    </div>

                    <div class="form-group">
                    <input type="submit" value = "Save Changes" class = 'btn btn-success btn-lg'>
                    <a href="{{ route('tasks.index') }}" class = 'btn btn-danger btn-lg pull-right'>Go Back</a>
                    </div>
                    
                    
                </form>
            </div>
            

        </div>
    </div>
</body>
</html>