<header class="main-header">
    <!-- Logo -->
    <a href="/admin/dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Sr</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Shortly</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{"Coder9"}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle"
                                alt="User Image">

                            <p>
                                {{"Coder9"}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="">
                                <form id="logout" action="/admin/logout" method="post">
                                    <a href="javascript:void(0);" class="btn btn-default btn-block btn-flat"
                                        onclick="document.getElementById('logout').submit();">Sign out</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>