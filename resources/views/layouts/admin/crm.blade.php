<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid bg-dark">
        @include("component.head-section")
    </div>
    <div class="container-fluid text-white bg-dark w-100">
        <div class="row">
            @include("component.crm-sidebar")
            @yield("content")
        </div>
    </div>

</body>
</html>
