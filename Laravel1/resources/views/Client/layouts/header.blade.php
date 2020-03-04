<nav class="khung">
    <div class="hung">
      <div class="fixtop position-fixed" id="top">
        <div class="header">
          <i class="far fa-clock">
            <span>Mon - Fri : 09:00 - 17:00</span>
        </i>
        <i class="gach">/</i>
        <i class="fas fa-location-arrow">
            <span>Tầng 7 Văn phòng Đại học Đông Á</span>
        </i>    
        <a href=""><i class="fab fa-twitter fahr"></i></a>
        <a href=""><i class="fab fa-tumblr fahr"></i></a>
        <a href=""><i class="fab fa-vimeo-v fahr"></i></a>
        <a href=""><i class="fab fa-google-plus-g fahr"></i></a>
        <a href=""><i class="fab fa-facebook-f fahr"></i></a>
        <i class="gach2">/</i>
        <i class="fas fa-phone fahr">
            <span>1800-222-222</span>
        </i>
        <i class="gach2">/</i>
        <i class="fas fa-envelope fahr">
            <span>contact@shopmaytinh.com</span>
        </i>
    </div>
    <div class="hnavbar">
      <div class="hlogo">
        <!-- <img src="public/images/logo.png"> -->
        <p>SHOP MÁY TÍNH PVT</p>
    </div>
    <div class="hmenu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(Session::has('cus_name'))
                <li class="nav-item">
                    <a class="nav-link hblue" href="/Laravel1/public/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hblue" href="/Laravel1/public/cart/show"><i class="fas fa-cart-plus">({{Cart::count()}})</i></a>
                </li>
                <li style="margin-left: 500px;" class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle hblue" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="font-size: 25px" class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('cus_name')}}</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('ordersInCustomer',Session::get('cus_id')) }}">
                            <i class="fas fa-money-bill-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Purchase history
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link hblue" href="/Laravel1/public/home">Home</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link hblue" href="/Laravel1/public/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hblue" href="/Laravel1/public/login">Login</a>
                </li>
                @endif             
            </ul>
        </div>
    </nav>
</div>
</div>
</div> 