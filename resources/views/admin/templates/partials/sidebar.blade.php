<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->

            {{--dasbboard--}}
            <li class="{{$subDashboard ?? ""}}"><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            {{--diagnisa--}}
            @role('pasien')
            <li class="{{$subDiagnosa ?? ""}}"><a href="{{url('/diagnosa')}}"><i class="fa fa-medkit"></i> <span>Diagnosa</span></a></li>
            @endrole

            @role('superadmin','admin')
            {{--msanajement akses--}}
            <li class="{{$subUser   ?? ""}} {{$subRole   ?? ""}} {{$subPermission   ?? ""}}  treeview">
                <a href=""><i class="fa fa-users"></i> <span>Access Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subUser   ?? ""}}">
                        <a href="{{route('admin.user.index')}}" class="nav-link"><i class="fa fa-user"></i><span>User</span></a>
                    </li>
                    <li class="nav-item {{$subRole   ?? ""}}">
                        <a href="{{route('admin.role.index')}}" class="nav-link"><i class="fa fa-archive"></i><span>Role</span></a>
                    </li>
                    <li class="nav-item {{$subPermission   ?? ""}}">
                        <a href="{{route('admin.permission.index')}}" class="nav-link"><i class="fa fa-shield"></i><span>Permission</span></a>
                    </li>

                </ul>
            </li>
            {{--module--}}
            <li class="{{$subArsip   ?? ""}} treeview">
                <a href=""><i class="fa fa-database"></i> <span>Module Arsip</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subArsip   ?? ""}}">
                        <a href="{{route('admin.surat_masuk.index')}}" class="nav-link">
                            <ion-icon name="mail-open-outline"></ion-icon>
                        <span>Arsip Surat Masuk</span></a>
                    </li>

                    <li class="nav-item {{$subArsip   ?? ""}}">
                        <a href="{{route('admin.surat_keluar.index')}}" class="nav-link">
                            <ion-icon name="mail-open-outline"></ion-icon>
                            <span>Arsip Surat Keluar</span></a>
                    </li>
                </ul>
            </li>
            {{--laporan--}}
            <li class="{{$subFakultas   ?? ""}} {{$subProdi   ?? ""}} {{$subJalurMasuk   ?? ""}}  {{$subGelombang   ?? ""}} {{$subBiayaPendaftaran   ?? ""}} treeview">
                <a href=""><i class="fa fa-print"></i> <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subFakultas   ?? ""}}">
                        <a href="" class="nav-link"><i class="fa fa-dashboard"></i><span>Report Surat masuk</span></a>
                    </li>
                    <li class="nav-item {{$subFakultas   ?? ""}}">
                        <a href="" class="nav-link"><i class="fa fa-dashboard"></i><span>Report Surat Keluar</span></a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
