<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container-fluid">
        @include("component.head-section")
    </div>
    <div class="container">
        @yield("content")
    </div>
</body>
</html>
