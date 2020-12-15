<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>

    <link rel="shortcut icon" href="https://freepngimg.com/thumb/stock_market/26072-3-stock-market-file-thumb.png" type="image/x-icon">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.css">
    <!--For DateTime Input Form-->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <!--Custom CSS Area-->
    <style>
           .hidden{
            display: none !important;
            }

            .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: none;
            }

            body{
                overflow: hidden;
            }
    </style>
</head>
<body>

    

    
    @include('partials.navbar') <!--Navigation Template-->
        @include('partials.alert')
        
        @yield('content')


        <a id="back-to-top" href="#" class="btn btn-danger btn-lg back-to-top" role="button">UP</a>


         <!-- Footer -->
            <footer class="page-footer  bg-dark text-white font-small blue mt-4">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a class="text-white" href="/stocks"> Chart.com</a>
            </div>
            <!-- Copyright -->

            </footer>
            <!-- Footer -->   
  



    <!--Script Area-->
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <!-- MDB core JavaScript for charting -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    
    @stack('scripts')   <!--Scirpt Inheritance-->

        <!--CUSTOM SCIRPT AREA-->
        <script>
            ///scroll up
                $(document).ready(function(){
                    $(window).scroll(function () {
                            if ($(this).scrollTop() > 50) {
                                $('#back-to-top').fadeIn();
                            } else {
                                $('#back-to-top').fadeOut();
                            }
                        });
                        // scroll body to 0px on click
                        $('#back-to-top').click(function () {
                            $('body,html').animate({
                                scrollTop: 0
                            }, 400);
                            return false;
                        });
                });
        
        //For Showing the Upload file name into Form Input
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        // Date Picker Initialization
        $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4'
                });

        </script>
    <!-- END CUSTOM SCRIPT AREA-->

    <!-- End Script Area-->
</body><!--body-->
</html><!--html-->