<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--===============================================================================================-->
<link rel="icon" type="image/png" href="/template/images/icons/favicon.png"/>
<!--=====================================/==========================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/css/util.css">
<link rel="stylesheet" type="text/css" href="/template/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/template/css/style.css">

<link href="/template/vendor/fontawesome/css/all.min.css" rel="stylesheet"/>
   <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/profile') }}">
                    <i class='fas fa-angle-left' style='font-size:36px'></i>                
                </a>
                <a class="navbar-brand" href="{{ url('/profile') }}">
                    Đổi Mật Khẩu
                    <?php
                        use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">',$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
 
                    </ul>  
                </div>
            </div>
        </nav>
    <div class="container mt-4">
       
        <form role="form" action="/doimk" method="POST">
            @csrf
            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
            {{-- <div>
                <label for="email">Email</label>
                <div class="">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div> --}}
            <div>
                <label for="password">Nhập Mật Khẩu Cũ</label>
                <div class="">
                    <input id="password" name="passwordold" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password">Nhập Mật Khẩu Mới</label>
                <div class="">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password_confirmation">Nhập Lại Mật Khẩu Mới</label>
                <div class="">
                    <input id="password-confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Password-confirmation" aria-label="Password-confirmation" aria-describedby="Password-addon">
                    @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" style="background: #63cff3;" class="btn bg-gradient-info w-100 mt-4 mb-0">Lưu</button>
            </div>
        </form>

    
 
   
     
<script src="{{ asset('js/profileupdate.js') }}"></script>
</body>
</html> 
    </div>
 
   
     
<script src="{{ asset('js/profileupdate.js') }}"></script>
</body>
</html> 