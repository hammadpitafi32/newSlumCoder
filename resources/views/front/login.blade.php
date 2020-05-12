<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Slum Coder') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="icon" href="{{asset('themeImages/slumcoder-logo.jpg')}}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            
                            <li style="color: red;">{{ Session::get('error')}}</li>
                           
                        </ul>
                    </div>
                    
                @endif
                <div class="signin-content">
                    <div class="signin-image">
                        <a href="{{route('.articles')}}"><figure><img title="Home page" src="images/signin-image.jpg" alt="sing up image"></figure></a>
                        <!-- <a href="#" class="signup-image-link">Create an account</a> -->
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" action="{{route('.userlogin')}}" id="register-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label style="padding-left: 5px;" for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email"  placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label style="padding-left: 5px;" for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <!-- <span class="social-label">Or login with</span> -->
                            <a href="{{route('userSignup')}}" class="signup-image-link">Create an account</a>
                            <!-- <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
<!--     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>