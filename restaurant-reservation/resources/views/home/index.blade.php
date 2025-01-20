<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    @include('home.navbar')
    <!--  About Section  -->
    @include('home.about')

    <!-- book a table Section  -->
    @include('home.booktable')

    <!-- BLOG Section  -->
    @include('home.menu')

    <!-- page footer  -->
    @include('home.footer')
    <!-- end of page footer -->

	@include('home.js')
    

</body>
</html>
