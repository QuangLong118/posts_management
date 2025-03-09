<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{asset('/assets/css/customize.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">YU+</h1>

            </div>
            <h3>Chào mừng đến với YU+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Đăng nhập.</p>
            <form class="m-t" role="form" action="{{ route('auth.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input name = "email" type="text" class="form-control" placeholder="Username" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="error-message">* {{$errors->first('email')}}</span> 
                    @endif
                </div>
                <div class="form-group">
                    <input name = "password" type="password" class="form-control" placeholder="Mật khẩu">
                    @if ($errors->has('password'))
                        <span class="error-message">* {{$errors->first('password')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                <a href="#"><small>Quên mật khẩu?</small></a>
                <p class="text-muted text-center"><small>Bạn chưa có tài khoản?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Tạo tài khoản</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2024</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('/assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
