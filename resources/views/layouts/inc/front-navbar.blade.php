<div class="white scrolling-navbar sticky-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Brand -->
                    <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                        <strong class="blue-text">MDB</strong>
                    </a>

                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link waves-effect" href="#">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/"
                                    target="_blank">About
                                    MDB</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect"
                                    href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                                    target="_blank">Free
                                    download</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/"
                                    target="_blank">Free
                                    tutorials</a>
                            </li>
                        </ul>

                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons">
                            <li class="nav-item">
                                <a class="nav-link waves-effect">
                                    <i class="fas fa-shopping-cart"></i>
                                    {{-- <span class="clearfix d-none d-sm-inline-block"> Cart </span> --}}
                                    {{-- akan di update ketika load ajax --}}
                                    <span class="clearfix">
                                        Cart
                                        <span class="basket-item-count">
                                            <span class="badge badge-pill red"> 0 </span>
                                        </span>
                                    </span>

                                </a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a href="{{ url('my-profile') }}" class="dropdown-item">
                                            My Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 py-2 bg-info shadow">
                @php
                    $group = App\Models\Group::where('status', '!=', '2')->get();
                @endphp
                @foreach ($group as $group_nav_item)
                    <a href="{{ url('collection/' . $group_nav_item->url) }}"
                        class="px-4 text-white">{{ $group_nav_item->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
