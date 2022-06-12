
<div class="app align-content-stretch d-flex flex-wrap">
    <div class="app-sidebar">
        <div class="logo">
            <a href="{{route('home')}}" class="logo-icon"><span class="logo-text">MPWA</span></a>
            <div class="sidebar-user-switcher user-activity-online">
                <a href="/">
                    <img src="{{asset('images/avatars/avatar2.png')}}">
                    <span class="activity-indicator"></span>
                    <span class="user-info-text">{{ Auth::user()->username}}<br></span>
                </a>
            </div>
        </div>
        <div class="app-menu">
            <ul class="accordion-menu">
                <li class="sidebar-title">
                    Apps
                </li>
                <li class="{{request()->is('home') ? 'active-page' : ''}}">
                    <a href="{{route('dashboard')}}" class=""><i class="material-icons-two-tone">dashboard</i>{{__('system.home')}}</a>
                </li>
                <li class="{{request()->is('file-manager') ? 'active-page' : ''}}">
                    <a href="{{route('file-manager')}}" class=""><i class="material-icons-two-tone">folder</i>{{__('File Manager')}}</a>
                </li>
                <li class="{{request()->is('autoreply') ? 'active-page' : ''}}">
                    <a href="{{route('autoreply')}}" class=""><i class="material-icons-two-tone">message</i>{{__('system.company')}}</a>
                </li>
                <li class="{{request()->is('tag') ? 'active-page' : ''}}">
                    <a href="{{route('tag')}}"><i class="material-icons-two-tone">contacts</i>{{__('system.package')}}</a>
                   
                </li>
            
                {{-- <li class="{{request()->is('schedule') ? 'active-page' : ''}}">
                    <a href="{{route('scheduleMessage')}}" class=""><i class="material-icons-two-tone">schedule</i>Schedule Message</a>
                </li> --}}
                <li class="sidebar-title">
                    Other
                </li>
                <li class="{{request()->is('rest-api') ? 'active-page' : ''}}">
                    <a href="{{route('rest-api')}}"><i class="material-icons-two-tone">api</i>{{__('system.restapi')}}</a>
                </li>
                <li class="{{request()->is('settings') ? 'active-page' : ''}}">
                    <a href="{{route('settings')}}"><i class="material-icons-two-tone">settings</i>{{__('system.setting')}}</a>
                </li>
               

            </ul>
        </div>
    </div>
    <div class="app-container">
        <div class="search">
            <form>
                <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
            </form>
            <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
        </div>
        <div class="app-header">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-nav" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                            </li>

                            <li class="nav-item dropdown hidden-on-mobile">
                                <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons-outlined">explore</i>
                                </a>

                            </li>
                        </ul>

                    </div>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                          

                            <li class="nav-item hidden-on-mobile">
                                <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">action</a>
                                <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-header h6 " style="border: 0; background-color :white;">Logout</button>
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>