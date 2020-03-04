<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shop Laptop PVT</title>
  <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script src="{{ asset('Client/js/jquery.js') }}"></script>
  <script src="{{ asset('Client/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('Client/js/jquery.scrollUp.min.js') }}"></script>
  <script src="{{ asset('Client/js/price-range.js') }}"></script>
  <script src="{{ asset('Client/js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('Client/js/main.js') }}"></script>
</head><!--/head-->

<body>
  <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("top").style.top = "0";
      } else {
        document.getElementById("top").style.top = "-100px";
      }
      prevScrollpos = currentScrollPos;
    }
  </script>
  <!--/header-->
  @include("Client.layouts.header")
  @include("Client.layouts.slider")

  <!--/slider-->
  <div class="container">
   @yield('content')
 </div>
 <br>
 <br>
 @include("Client.layouts.footer")
 <!--/Footer-->
 <script src="assets/dest/js/jquery.js"></script>
 <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
 <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
 <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
 <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
 <script src="assets/dest/vendors/animo/Animo.js"></script>
 <script src="assets/dest/vendors/dug/dug.js"></script>
 <script src="assets/dest/js/scripts.min.js"></script>
 <script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
 <script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
 <script src="assets/dest/js/waypoints.min.js"></script>
 <script src="assets/dest/js/wow.min.js"></script>
 <!--customjs-->
 <script src="assets/dest/js/custom2.js"></script>
 <script>
  $(document).ready(function($) {    
    $(window).scroll(function(){
      if($(this).scrollTop()>150){
        $(".header-bottom").addClass('fixNav')
      }else{
        $(".header-bottom").removeClass('fixNav')
      }}
      )
  })
</script>
<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

  
    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>

</body>
</html>
