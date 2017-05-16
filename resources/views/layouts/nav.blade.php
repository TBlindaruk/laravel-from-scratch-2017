<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">New features</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="#">New hires</a>
            @if (Auth::check())
                <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a> {{--ili Auth::user()->name--}}
            @endif
        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">Laravel from scratch</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
</div>
