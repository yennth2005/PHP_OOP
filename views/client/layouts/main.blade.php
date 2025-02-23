<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpofyKGjJUUq0cEj8SoG<\ctrl61>D6r4iY+IR+c5tdBG0uYJwl33GsXqO3+A1/nm==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{file_url('assets/client/css/styles.css')}}" rel="stylesheet" />
        <link href="{{file_url('assets/client/css/detail.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        @include('client.layouts.partials.nav');
        <!-- Header-->
        @include('client.layouts.partials.header');
        <!-- Section-->
        @yield('content')
        <!-- Footer-->
        @include('client.layouts.partials.footer');
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{file_url('assets/client/js/scripts.js')}}"></script>
    </body>
</html>
