
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <div class="user-info">
                            <img src="{{ asset('assetsDashboard/images/img.jpg') }}" alt="" class="user-avatar">
                            @auth
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fa fa-angle-down"></i>
                            @else
                                <span>Welcome, Guest</span>
                            @endauth
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Log Out
                        </a>
                    </div>
                </li>

                <!-- Messages Dropdown -->
                <li role="presentation" class="nav-item dropdown open">
                    <a href="{{ route('messages.index') }}" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{ $unreadCount }}</span>
                    </a>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach ($messages as $message)
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('messages.show', $message->id) }}">
                                    <span class="image"><img src="{{ asset('assetsDashboard/images/img.jpg') }}" alt="Profile Image" /></span>
                                    <span>
                                        <span>{{ $message->name }}</span>
                                        <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                        {{ Str::words($message->message, 10, '...') }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="{{ route('messages.index') }}">
                                    <strong>See All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- End Dropdown Menu -->
                </li>
                <!-- End Messages Dropdown -->
            </ul>
        </nav>
    </div>
</div>


