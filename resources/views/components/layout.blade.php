<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
    <style>
        * {
            box-sizing: border-box;
        }

        .table-comment {
            border-left: 1px solid #ccd4db;
            border-right: 1px solid #ccd4db;
        }
        
        .table-row {
            display: flex;
            /* flex-wrap: wrap; */
            border-bottom: 1px solid #ccd4db;
        }

        .table-cell {
            padding: 8px;
            
            box-sizing: border-box;
        }

        .table-row .table-cell:first-child {
            border-right: 1px solid #ccd4db;
            background: #E1E4F2;
        }

        .full-width {
            width: 100%;
            background-color: rgb(13,110,253) !important;
            color: white;
        }

        .left-cell {
            min-width: 140px;
        }

        .right-cell {
            width: 100%;
        }

        .user-info {
            font-size: 12px;
        }

        .topic-name {
            font-size: 14px;
            font-weight: 700;
        }

        span.admin {
            color: red;
        }

        @media (max-width: 768px) {
            /* .left-cell, .right-cell {
                flex: 0 0 100%;
            } */
        }
    </style>

        <x-header/>
            {{ $slot }}
        <x-footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
