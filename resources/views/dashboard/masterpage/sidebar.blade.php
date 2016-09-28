<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ALGEMEEN</li>
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li><a href="{{ url('dashboard/contact') }}"><i class="fa fa-envelope-o"></i> <span>Contact</span></a></li>
            <li><a href="{{ url('/') }}"><i class="fa fa-link"></i> <span>Mijn website</span></a></li>

            <li class="header">VOERTUIGEN</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('dashboard/occasion') }}"><i class="fa fa-th-list"></i> <span>Voertuig overzicht</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-plus"></i> <span>Voertuig invoeren</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-down pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('dashboard/occasion/create') }}"><i class="fa fa-circle-o"></i>Vrije invoer</a></li>
                    <li><a href="{{ url('dashboard/occasion/createkenteken') }}"><i class="fa fa-circle-o"></i>Op kenteken</a></li>
                    <li><a href="{{ url('dashboard/import') }}"><i class="fa fa-circle-o"></i>Excel importeren</a></li>
                </ul>
            </li>

            <li class="header">ONDERDELEN</li>
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-th-list"></i> <span>Onderdelen overzicht</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-plus"></i> <span>Onderdelen invoeren</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('dashboard') }}">Onderdelenlijn</a></li>
                    <li><a href="{{ url('dashboard') }}">Vrije invoer</a></li>
                </ul>
            </li>

            <li class="header">DOORVOER</li>
            <li><a href="{{ url('dashboard/doorvoer/overzicht') }}"><i class="fa fa-th-list"></i> <span>Doorvoer overzicht</span></a></li>

            <li class="header">CONTACT</li>

            <li class="header">ONDERDELEN</li>

            <li class="header">ADMINISTRATIE</li>

            <li class="header">SOCIAL MEDIA</li>

            <li class="header">HANDEL</li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>