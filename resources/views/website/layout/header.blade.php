<div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0"
  data-animated role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand navbar-brand-logo">
        <a class="svg" href="index.html">
          <svg viewBox="0 0 106 64" height="100%" width="100%" preserveAspectRatio="xMidYMid meet">
            <!-- Paths for "Modern School" -->
            <path d="M10,20h5v20h-5V20z" /> <!-- Example path for "M" -->
            <path d="M20,20h5v20h-5V20z" /> <!-- Example path for "o" -->
            <path d="M30,20h5v20h-5V20z" /> <!-- Example path for "d" -->
            <path d="M40,20h5v20h-5V20z" /> <!-- Example path for "e" -->
            <path d="M50,20h5v20h-5V20z" /> <!-- Example path for "r" -->
            <path d="M60,20h5v20h-5V20z" /> <!-- Example path for "n" -->
            <path d="M70,20h5v20h-5V20z" /> <!-- Example path for "S" -->
            <path d="M80,20h5v20h-5V20z" /> <!-- Example path for "c" -->
            <path d="M90,20h5v20h-5V20z" /> <!-- Example path for "h" -->
            <path d="M100,20h5v20h-5V20z" /> <!-- Example path for "o" -->
            <path d="M110,20h5v20h-5V20z" /> <!-- Example path for "o" -->
            <path d="M120,20h5v20h-5V20z" /> <!-- Example path for "l" -->
          </svg>
        </a>
      </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav navbar-nav-margin-left">
        <li class="dropdown ">
          {{-- <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown">Home<span class="caret"></span></a> --}}
          <a href="{{ route('home') }}" class="dropdown-toggle">Home<span class="caret"></span></a>
          <ul class="dropdown-menu">
            {{-- <li class="active"><a href="index.html">Home page</a></li> --}}
            {{-- <li><a href="pricing.html">Pricing</a></li>
            <li><a href="tutors.html">Tutors</a></li>
            <li><a href="survey.html">Survey</a></li>
            <li><a href="website-forum.html">Forum Home</a></li>
            <li><a href="website-forum-category.html">Forum Category</a></li>
            <li><a href="website-forum-thread.html">Forum Thread</a></li>
            <li><a href="website-blog.html">Blog Listing</a></li>
            <li><a href="website-blog-post.html">Blog Post</a></li>
            <li><a href="website-contact.html">Contact</a></li> --}}
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <span class="caret"></span></a>
          {{-- <ul class="dropdown-menu">
            <li><a href="website-directory-grid.html">Grid Directory</a></li>
            <li><a href="website-directory-list.html">List Directory</a></li>
            <li><a href="website-course.html">Single Course</a></li>
          </ul> --}}
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Students <span class="caret"></span></a>
          {{-- <ul class="dropdown-menu">
            <li><a href="website-student-dashboard.html">Dashboard</a></li>
            <li><a href="website-student-courses.html">My Courses</a></li>
            <li><a href="website-take-course.html">Take Course</a></li>
            <li><a href="website-course-forums.html">Course Forums</a></li>
            <li><a href="website-take-quiz.html">Take Quiz</a></li>
            <li><a href="website-student-messages.html">Messages</a></li>
            <li><a href="website-student-profile.html">Private Profile</a></li>
          </ul> --}}
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>
          {{-- <ul class="dropdown-menu">
            <li><a href="website-instructor-dashboard.html">Dashboard</a></li>
            <li><a href="website-instructor-courses.html">My Courses</a></li>
            <li><a href="website-instructor-course-edit-course.html">Edit Course</a></li>
            <li><a href="website-instructor-earnings.html">Earnings</a></li>
            <li><a href="website-instructor-statement.html">Statement</a></li>
            <li><a href="website-instructor-messages.html">Messages</a></li>
            <li><a href="website-instructor-profile.html">Private Profile</a></li>
          </ul> --}}
        </li>
        {{-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">UI <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="essential-buttons.html">Buttons</a></li>
            <li><a href="essential-icons.html">Icons</a></li>
            <li><a href="essential-progress.html">Progress</a></li>
            <li><a href="essential-grid.html">Grid</a></li>
            <li><a href="essential-forms.html">Forms</a></li>
            <li><a href="essential-tables.html">Tables</a></li>
            <li><a href="essential-tabs.html">Tabs</a></li>
          </ul>
        </li> --}}
      </ul>
      <div class="navbar-right">


      @guest
         



    @php
      $tenantDomain   = request()->segment(1);
    @endphp
      @if ($tenantDomain)
        @php
            $tenant = App\Models\Tenant::where('domain', $tenantDomain)->first();
        @endphp
          @if ($tenant)
              @if (Route::has('login'))
                <a class="navbar-btn btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
              @endif
              @if (Route::has('register'))
                  <a class="navbar-btn btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
          @else
           
            @if (Route::has('enrollment.create'))
                <a class="navbar-btn btn btn-primary" href="{{ route('enrollment.create') }}">Enroll</a>
            @endif
          @endif
      @else
          @if (Route::has('login'))
            <a class="navbar-btn btn btn-primary" href="{{ url('login') }}">{{ __('Login') }}</a>
          @endif
          @if (Route::has('enrollment.create'))
            <a class="navbar-btn btn btn-primary" href="{{ route('enrollment.create') }}">Enroll</a>
          @endif
      @endif
      
@else
    <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
        <!-- User Dropdown -->
        <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('website/images/people/110/guy-6.jpg') }}" alt="" class="img-circle" />
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                @if (auth()->user() && auth()->user()->hasRole('admin') || auth()->user() && auth()->user()->hasRole('super-admin'))
                    <a href="{{ route('admin_dashboard') }}">
                        <i class="fa fa-bar-chart-o"></i> Admin Dashboard
                    </a>
                @elseif (auth()->user() && auth()->user()->hasRole('teacher'))
                    <a href="{{ route('teacher_dashboard') }}">
                        <i class="fa fa-chalkboard-teacher"></i> Teacher Dashboard
                    </a>
                @elseif (auth()->user() && auth()->user()->hasRole('student'))
                    <a href="{{ route('student_dashboard') }}">
                        <i class="fa fa-book"></i> Student Dashboard
                    </a>
                @endif
              </li>            
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
            </ul>
        </li>
        <!-- // END User Dropdown -->
    </ul>
@endguest
        {{-- <a href="login.html" class="navbar-btn btn btn-primary">Log In</a> --}}
      </div>
    </div>
    <!-- /.navbar-collapse -->

  </div>
</div>