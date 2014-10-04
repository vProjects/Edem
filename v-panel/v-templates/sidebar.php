<nav class="navbar-default navbar-static-side app-header" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <?php if($level >= 2) { ?>
            <li>
                <a href="create-event.php"><i class="fa fa-edit fa-fw"></i>Create Event</a>
            </li>
            <li>
                <a href="create-group.php"><i class="fa fa-edit fa-fw"></i>Create Group</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Student<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="create-student.php">Create Student</a>
                    </li>
                    <li>
                        <a href="#">List Student</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
            <?php if($level >= 3) { ?>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Faculty<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="create-faculty.php">Create Faculty</a>
                    </li>
                    <li>
                        <a href="#">List Faculty</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
            <?php if($level >= 4) { ?>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i>Chair Person<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="create-chairperson.php">Create Chair Person</a>
                    </li>
                    <li>
                        <a href="#">List Chair Person</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="create-room.php"><i class="fa fa-edit fa-fw"></i>Create Room</a>
            </li>
            <?php } ?>
            <?php if($level >= 2) { ?>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Courses<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="create-course.php">Create Courses</a>
                    </li>
                    <li>
                        <a href="list-course.php">List Courses</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i>Curriculum<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                	<li>
                        <a href="curriculum-updated.php">Student Selected Curriculum</a>
                    </li>
                    <li>
                        <a href="create-curriculum.php">Create Curriculum</a>
                    </li>
                    <li>
                        <a href="list-curriculum.php">List Curriculum</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
            <li>
                <a href="submit-ticket.php"><i class="fa fa-envelope-o fa-fw"></i> Submit Ticket</a>
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</nav>
<!-- /.navbar-static-side -->