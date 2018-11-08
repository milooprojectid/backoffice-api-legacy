<!--HEADER-->
<header id="top-head" class="uk-position-fixed">
    <div class="uk-container uk-container-expand uk-background-primary">
        <nav class="uk-navbar uk-light" data-uk-navbar="mode:click; duration: 250">
            <div class="uk-navbar-left">
                <div class="uk-navbar-item uk-hidden@m">
                    <a class="uk-logo" href="#"><img class="custom-logo" src="img/dashboard-logo-white.svg" alt=""></a>
                </div>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="#" data-uk-icon="icon:user" title="Your profile" data-uk-tooltip></a></li>
                    <li><a href="#" data-uk-icon="icon: settings" title="Settings" data-uk-tooltip></a></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-uk-icon="icon: sign-out" title="Sign Out" data-uk-tooltip></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
    </div>
</header>
<!--/HEADER-->
