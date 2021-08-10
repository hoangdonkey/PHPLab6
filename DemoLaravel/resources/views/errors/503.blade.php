<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html,body {
            height:100%;
        }
        body {
            margin:0;
            padding:0;
            width:100%;
            color: #B0BEC5;
            display:table;
            font-weight: 100;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size:72px;
            margin-bottom: 40px;
        }
    </style>
    <title>Be right back</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">Be right back</div>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <strong>ERROR!!!</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
