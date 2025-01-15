<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varta:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/costume.css') }}">
    @yield('styles')
    <style>
    body {
        font-family: "Varta", serif;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: "Varta", serif;
    }
</style>
</head>
<body>
    <div class="row">
        @include('fe-pages.partials.topnav')
        @include('fe-pages.partials.navbar')
    </div>
    <div class="row">
        @yield('content')
    </div>
    <div class="row">      
        @include('fe-pages.partials.partners')
    </div>
    <footer>
        @include('fe-pages.partials.footer')
    </footer>

    <!-- Back to top button -->
    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="bi bi-chevron-up"></i>
    </button>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/timeline.js') }}"></script>
    
    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                    ) {
                        mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
    </script>
</body>
</html>