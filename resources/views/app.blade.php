<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Swagger Petstore</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script> var base_url = '<?php url(); ?>';</script>
    </head>
    <body>

        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pets
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('pet/add') }}">Add a new pet to the store</a>
                            <a class="dropdown-item" href="{{ url('pet/update') }}">Update an existing pet</a>
                            <a class="dropdown-item" href="{{ url('/pet/findByStatus') }}">Finds Pets by status</a>
                            <a class="dropdown-item" href="{{ url('pet/find') }}">Find pet by ID</a>
                            <a class="dropdown-item" href="{{ url('pet/updateByFormData') }}">Updates a pet in the store with form data</a>
                            <a class="dropdown-item" href="{{ url('pet/delete') }}">Deletes a pet</a>
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>

        @yield('content')
    </body>
</html>