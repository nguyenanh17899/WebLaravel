<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        /* footer {
            background-color: #555;
            color: white;
            padding: 15px;
        } */

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

        .header {
            background-color: #0D1323;
            padding-bottom: 20px;
            padding-top: 20px;
        }

        h1 {
            color: white;
            text-align: center;
        }
    </style>
    @yield('css')
</head>

<body>
    <?php //Hiển thị thông báo thành công
    ?>
    @if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif

    <?php //Hiển thị thông báo lỗi
    ?>
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
    <div class="container">
        @section('menu')
        <div class="header">
            <h1>QUẢN LÝ ĐÀO TẠO SINH VIÊN</h1>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a href="/user/student">Sinh viên</a></li>
            <li class="nav-item"><a href="/user/teacher">Giáo viên</a></li>
            <li class="nav-item"><a href="/excersize">Bài tập</a></li>
            <li class="nav-item"><a href="/challenge">Thử thách </a></li>
            <li class="nav-item"><a href="/user/profile/{{ Auth::user()->id }}">Trang cá nhân</a></li>


            <ul class="nav navbar-nav navbar-right">
                <li style="margin-right:30px;"><a href="/logout">Thoát</a> </li>
                <li style="margin-right:50px;">Welcome @yield('loged')</li>
            </ul>
        </ul>
        @show
    </div>


    <div class="container">
        @section('content')
        
        @yield('content')
    </div>
    <!-- <footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer> -->

    {{-- js start --}}
    @section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000);
    </script>
    @yield('js')
    {{-- js end --}}

</body>

</html>