<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
        	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        	  <h5 class="centered">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
        	  	
            <li class="mt">
                <a href="index.html">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a class="{{ Request::is('admin/articles*') ? 'active' : '' }}" href="javascript:;" >
                    <i class="fas fa-newspaper"></i>
                    <span>Naujienos</span>
                </a>
                <ul class="sub">
                    <li class="{{ Request::is('admin/articles') ? 'active' : '' }}">
                        <a href="/admin/articles"><i class="fas fa-list"></i>Straipsniai</a>
                    </li>
                    <li class="{{ Request::is('admin/articles/create') ? 'active' : '' }}">
                        <a href="/admin/articles/create"><i class="fas fa-plus"></i>Naujas straipsnis</a>
                    </li>
                    <li class="{{ Request::is('admin/articles/categories') ? 'active' : '' }}">
                        <a href="/admin/articles/categories"><i class="fas fa-list"></i>Kategorijos</a>
                    </li>
                    <li class="{{ Request::is('admin/articles/categories/create') ? 'active' : '' }}">
                        <a href="/admin/articles/categories/create"><i class="fas fa-plus"></i>Nauja kategorija</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="calendar.html">Calendar</a></li>
                    <li><a  href="gallery.html">Gallery</a></li>
                    <li><a  href="todo_list.html">Todo List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Extra Pages</span>
                </a>
                <ul class="sub">
                    <li class="active"><a  href="blank.html">Blank Page</a></li>
                    <li><a  href="login.html">Login</a></li>
                    <li><a  href="lock_screen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Forms</span>
                </a>
                <ul class="sub">
                    <li><a  href="form_component.html">Form Components</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="basic_table.html">Basic Table</a></li>
                    <li><a  href="responsive_table.html">Responsive Table</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub">
                    <li><a  href="morris.html">Morris</a></li>
                    <li><a  href="chartjs.html">Chartjs</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->