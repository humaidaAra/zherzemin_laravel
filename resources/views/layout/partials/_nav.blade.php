
<header>
    <div id="navBG"></div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select').select2();
});
</script>
    <nav class="navbar">
        {{-- <form action="/logout" method="get">
            @csrf
            <button href="/logout" class="btn btn-default">Logout</button>
        </form> --}}
        <span id="person">{{ auth()->user()->name }}</span>
        <a href="#"><img src="/zherzamin.svg" class="nav-logo" /></a>
        @include('layout.partials._side')
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>    
