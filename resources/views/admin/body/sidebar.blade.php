<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{url('/')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Dash</b>board</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="index.html">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All Sub Category</a></li>
{{--
                    <li><a href="{{route('subcategory.edit')}}"><i class="ti-more"></i>Edit Sub Category</a></li>
--}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Chef</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.chefs')}}"><i class="ti-more"></i>All Chefs</a></li>
                    <li><a href="{{route('add.chefs')}}"><i class="ti-more"></i>Add Chefs</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Meals</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.meals') }}"><i class="ti-more"></i>All Meals</a></li>
                    <li><a href="{{route('add.meals')}}"><i class="ti-more"></i>Add Meals</a></li>
                </ul>
            </li>




            <li class="header nav-small-cap">EXTRA</li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Table</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.tables') }}"><i class="ti-more"></i>All Tables</a></li>
                    <li><a href="{{ route('add.tables') }}"><i class="ti-more"></i>Add Table</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Booking</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.bookings') }}"><i class="ti-more"></i>All Bookings</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.logout')}}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->

        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>

        <!-- item-->

        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>

        <!-- item-->
        <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>