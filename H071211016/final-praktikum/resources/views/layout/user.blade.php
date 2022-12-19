<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JoeBLog landing page.">
    <meta name="author" content="Devcrud">
    <title>Blog Zyztem</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('blogTemplate/assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + JoeBLog main styles -->
	<link rel="stylesheet" href="{{asset('blogTemplate/assets/css/joeblog.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- page First Navigation -->
    
    <!-- End Of First Navigation -->

    <!-- Page Second Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">                     
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/articleList">Article List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/memberList">Member List</a>
                    </li>
                </ul>
                <div class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a type="button" href="login" class="btn btn-light rounded">Login</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Of Page Second Navigation -->
    
    @yield('content')

    

    <!-- Page Footer -->
    
    <!-- End of Page Footer -->

	<!-- core  -->
    <script src="http://127.0.0.1:8000/blogTemplate/assets/vendors/jquery/jquery341.js"></script>
    <script src="http://127.0.0.1:8000/blogTemplate/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- JoeBLog js -->
    <script src="http://127.0.0.1:8000/blogTemplate/assets/js/joeblog.js"></script>

    <!-- datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready( function () {
         $('#tableBlog').DataTable();
      } );
   </script>


</body>
</html>
