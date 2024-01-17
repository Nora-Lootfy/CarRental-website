<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.includes.sidebar')
        @include('admin.includes.topNavigation')
        @include('admin.includes.listContent')
        @include('admin.includes.footer')
    </div>
</div>
@include('admin.includes.js')
</body>
</html>
