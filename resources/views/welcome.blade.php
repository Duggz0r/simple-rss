<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple RSS Reader</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#rsstable').DataTable();
        });
    </script>

    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            background: #ffffff;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table tr td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><a href="{{ route('welcome') }}">Nice and Simple RSS Feed reader</a></h3>
            <p><em>By Andy Duggan</em></p>
            @include('partials.form')

            @include('partials.edit')

            @include('partials.error')

            @if($articles)
                @include('partials.table')
            @endif
        </div>
    </div>
</div>
</body>
</html>
