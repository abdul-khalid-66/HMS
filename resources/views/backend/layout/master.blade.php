<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/educate-custon-icon.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('css')

    
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    {{-- @extends('backend.layout.sidebar') --}}
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{ route('admin_dashboard') }}"><img class="main-logo" src="{{ asset('backend/img/logo/logo.png') }}" alt="" /></a>
                <strong><a href="{{ route('admin_dashboard') }}"><img src="{{ asset('backend/img/logo/logosn.png') }}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="{{ route('admin_dashboard') }}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="{{ route('admin_dashboard') }}"><span class="mini-sub-pro">Dashboard</span></a></li>
                               
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="{{ route('teachers_view')}}" aria-expanded="false"><span
                                    class="educate-icon educate-teacher icon-wrap"></span> <span
                                    class="mini-click-non">Teachers</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Teachers" href="{{ route('teachers_view')}}"><span class="mini-sub-pro">All
                                            Teachers</span></a></li>
                                <li><a title="Add Teacher" href="{{ route('teacher_create')}}"><span class="mini-sub-pro">Add
                                            Teacher</span></a></li>
                                <li><a title="Edit Teacher" href="edit-teacher.html"><span class="mini-sub-pro">Edit
                                            Teacher</span></a></li>
                                <li><a title="Teacher Profile" href="teacher-profile.html"><span
                                            class="mini-sub-pro">Teacher Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span
                                    class="educate-icon educate-student icon-wrap"></span> <span
                                    class="mini-click-non">Students</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">All
                                            Students</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Add
                                            Student</span></a></li>
                                <li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit
                                            Student</span></a></li>
                                <li><a title="Students Profile" href="student-profile.html"><span
                                            class="mini-sub-pro">Student Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span
                                    class="educate-icon educate-course icon-wrap"></span> <span
                                    class="mini-click-non">Classes</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Classes" href="all-courses.html"><span class="mini-sub-pro">All
                                            Classes</span></a></li>
                                <li><a title="Add Classes" href="add-course.html"><span class="mini-sub-pro">Add
                                            class</span></a></li>
                                <li><a title="Edit Classes" href="edit-course.html"><span class="mini-sub-pro">Edit
                                            class</span></a></li>
                                <li><a title="Classes Profile" href="course-info.html"><span
                                            class="mini-sub-pro">Classes Info</span></a></li>
                                <li><a title="Product Payment" href="course-payment.html"><span
                                            class="mini-sub-pro">Classes Payment</span></a></li>
                            </ul>
                        </li>


                        {{-- 
                        Admin Panel
                            Dashboard:
                                Total Students
                                Total Teachers
                                Total Fees Collected
                                Total Salaries Paid
                                Upcoming Events/Notifications 
                            Student Management: 
                                Add/Edit/Delete Students
                                View Student Profiles (Name, Class, Fees, Attendance, Grades, etc.) 
                                Assign Students to Classes/Sections 
                            Teacher Management: 
                                Add/Edit/Delete Teachers 
                                View Teacher Profiles (Name, Subject, Salary, Contact, etc.) 
                                Assign Teachers to Classes/Subjects 
                            Fee Management: 
                                Track Fee Payments (Paid/Unpaid) 
                                Generate Fee Reports 
                            Salary Management: 
                                Track Teacher Salaries (Paid/Unpaid) 
                                Generate Salary Reports 
                            Attendance Management: 
                                Track Student and Teacher Attendance 
                                Generate Attendance Reports 
                            Exam/Grades Management: 
                                Add Exam Results 
                                View Student Grades 
                                Generate Report Cards 
                            Notifications: 
                                Send Notifications to Students/Teachers (e.g., Events, Holidays, etc.) 
                            --}}

                            {{-- 
                            Teacher Section
                                Dashboard:
                                    View Assigned Classes/Subjects
                                    View Student List (for their classes) 
                                    View Attendance Records 
                                Student Management:
                                    Mark Attendance
                                    Add/Update Grades
                                Profile Management:
                                    Update Personal Information
                                    View Salary Details
                                Notifications:
                                    Receive Notifications from Admin 
                                --}}
                            {{-- 
                            Student Section
                                Dashboard:
                                    View Attendance
                                    View Grades/Report Card
                                    View Fee Status
                                Profile Management:
                                    Update Personal Information
                                Notifications:
                                    Receive Notifications from Admin/Teachers 

                                    
                                    https://chatgpt.com/canvas/shared/67cdd4a84b4c81919e46a15784aacffd
                            --}}
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    {{-- @yield('content') --}}
 <!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index1.html">
                        <img class="main-logo" src="{{ asset('backend/img/logo/logo.png') }}"
                            alt="" />
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    {{-- <div class="header-top-menu tabl-d-n">
                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">About</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                            </li>
                                            <li class="nav-item dropdown res-dis-nn">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle">Project <span
                                                        class="angle-down-topmenu"><i
                                                            class="fa fa-angle-down"></i></span></a>
                                                <div role="menu" class="dropdown-menu animated zoomIn">
                                                    <a href="#" class="dropdown-item">Documentation</a>
                                                    <a href="#" class="dropdown-item">Expert Backend</a>
                                                    <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                    <a href="#" class="dropdown-item">Contact Support</a>
                                                </div>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item dropdown">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle"><i
                                                        class="educate-icon educate-message edu-chat-pro"
                                                        aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                <div role="menu"
                                                    class="author-message-top dropdown-menu animated zoomIn">
                                                    <div class="message-single-top">
                                                        <h1>Message</h1>
                                                    </div>
                                                    <ul class="message-menu">
                                                        <li>
                                                            <a href="#">
                                                                <div class="message-img">
                                                                    <img src="{{ asset('backend/img/contact/1.jpg') }}" alt="">
                                                                </div>
                                                                <div class="message-content">
                                                                    <span class="message-date">16 Sept</span>
                                                                    <h2>Advanda Cro</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="message-view">
                                                        <a href="#">View All Messages</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                                    aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                        class="educate-icon educate-bell" aria-hidden="true"></i><span
                                                        class="indicator-nt"></span></a>
                                                <div role="menu"
                                                    class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                        <h1>Notifications</h1>
                                                    </div>
                                                    <ul class="notification-menu">
                                                        <li>
                                                            <a href="#">
                                                                <div class="notification-icon">
                                                                    <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                        aria-hidden="true"></i>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <span class="notification-date">16 Sept</span>
                                                                    <h2>Advanda Cro</h2>
                                                                    <p>Please done this project as soon possible.</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="notification-view">
                                                        <a href="#">View All Notification</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle">
                                                    <img src="{{ asset('backend/img/product/pro4.jpg') }}" alt="" />
                                                    <span class="admin-name">{{ auth()->user()->name }}</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu"
                                                    class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="#"><span
                                                                class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                            Profile</a>
                                                    </li>
                                                    <li><a href="#"><span
                                                                class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            <i class="fa fa-sign-out"></i> Logout
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                        {{-- <a href="{{ route('logout') }}"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a> --}}
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown"
                                                    role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle"><i
                                                        class="educate-icon educate-menu"></i></a>

                                                <div role="menu"
                                                    class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                    <ul class="nav nav-tabs custon-set-tab">
                                                        <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                        </li>
                                                        <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                        </li>
                                                        <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content custom-bdr-nt">
                                                        <div id="Notes" class="tab-pane fade in active">
                                                            <div class="notes-area-wrap">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-comments-o"></i> Latest Notes
                                                                    </h2>
                                                                    <p>You have 10 new message.</p>
                                                                </div>
                                                                <div class="notes-list-area notes-menu-scrollbar">
                                                                    <ul class="notes-menu-list">
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="notes-list-flow">
                                                                                    <div class="notes-img">
                                                                                        <img src="{{ asset('backend/img/contact/4.jpg') }}"
                                                                                            alt="" />
                                                                                    </div>
                                                                                    <div class="notes-content">
                                                                                        <p> The point of using Lorem
                                                                                            Ipsum is that it has a
                                                                                            more-or-less normal.</p>
                                                                                        <span>Yesterday 2:45 pm</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="Projects" class="tab-pane fade">
                                                            <div class="projects-settings-wrap">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                    <p> You have 20 projects. 5 not completed.</p>
                                                                </div>
                                                                <div
                                                                    class="project-st-list-area project-st-menu-scrollbar">
                                                                    <ul class="projects-st-menu-list">
                                                                        <li>
                                                                            <a href="#">
                                                                                <div class="project-list-flow">
                                                                                    <div class="projects-st-heading">
                                                                                        <h2>Web Development</h2>
                                                                                        <p> The point of using Lorem
                                                                                            Ipsum is that it has a more
                                                                                            or less normal.</p>
                                                                                        <span class="project-st-time">1
                                                                                            hours ago</span>
                                                                                    </div>
                                                                                    <div class="projects-st-content">
                                                                                        <p>Completion with: 28%</p>
                                                                                        <div
                                                                                            class="progress progress-mini">
                                                                                            <div style="width: 28%;"
                                                                                                class="progress-bar progress-bar-danger hd-tp-1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <p>Project end: 4:00 pm -
                                                                                            12.06.2014</p>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="Settings" class="tab-pane fade">
                                                            <div class="setting-panel-area">
                                                                <div class="note-heading-indicate">
                                                                    <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                    <p> You have 20 Settings. 5 not completed.</p>
                                                                </div>
                                                                <ul class="setting-panel-list">
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Show notifications</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Disable Chat</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example3">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example3">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Enable history</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example4">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example4">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Show charts</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example7">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example7">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Update everyday</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            checked=""
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example2">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example2">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Global search</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            checked=""
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example6">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example6">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="checkbox-setting-pro">
                                                                            <div class="checkbox-title-pro">
                                                                                <h2>Offline users</h2>
                                                                                <div class="ts-custom-check">
                                                                                    <div class="onoffswitch">
                                                                                        <input type="checkbox"
                                                                                            name="collapsemenu"
                                                                                            checked=""
                                                                                            class="onoffswitch-checkbox"
                                                                                            id="example5">
                                                                                        <label class="onoffswitch-label"
                                                                                            for="example5">
                                                                                            <span
                                                                                                class="onoffswitch-inner"></span>
                                                                                            <span
                                                                                                class="onoffswitch-switch"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span
                                                class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demoevent" href="#">Teachers <span
                                                class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a href="{{ route('teachers_view')}}">All Teachers</a>
                                            </li>
                                            <li><a href="add-teacher.html">Add Teacher</a>
                                            </li>
                                            <li><a href="edit-teacher.html">Edit Teacher</a>
                                            </li>
                                            <li><a href="teacher-profile.html">Teacher Profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span
                                                class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demopro" class="collapse dropdown-header-top">
                                            <li><a href="all-students.html">All Students</a>
                                            </li>
                                            <li><a href="add-student.html">Add Student</a>
                                            </li>
                                            <li><a href="edit-student.html">Edit Student</a>
                                            </li>
                                            <li><a href="student-profile.html">Student Profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#democrou" href="#">Classes <span
                                                class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="democrou" class="collapse dropdown-header-top">
                                            <li><a href="all-classes.html">All Classes</a>
                                            </li>
                                            <li><a href="add-course.html">Add class</a>
                                            </li>
                                            <li><a href="edit-course.html">Edit class</a>
                                            </li>
                                            <li><a href="course-profile.html">Classes Info</a>
                                            </li>
                                            <li><a href="course-payment.html">Classes Payment</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('admin_dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Dashboard</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    @yield('content')

</div>
    @extends('backend.layout.footer')
    @stack('js')
</body>

</html>