<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
     body {
            background: linear-gradient(135deg, #b399d4 0%, #f3e5ff 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            color: #333;
        }

    .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
        }


    </style>


</head>
<body>
    <a href="{{ route('products.index')}}">
    <div class="logo">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="40" fill="#6a3093"/>
            <text x="50" y="60" font-size="40" text-anchor="middle" fill="white">logo</text>
        </svg>
    </div>
    </a>
        @yield('content')
</body>
</html>
