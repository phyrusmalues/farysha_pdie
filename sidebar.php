
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Admin</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
    <?php 
        if (isset($_GET['dashboard'])){ ?>
            <li class="active">
                <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                    Welcome
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                    Welcome
                </a>
            </li>
        <?php }
        
        if (isset($_GET['room_mang'])){ ?>
            <li class="active">
                <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                    Manage Rooms
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                    Manage Rooms
                </a>
            </li>
        <?php }
        if (isset($_GET['staff_mang'])){ ?>
            <li class="active">
                <a href="index.php?students"><em class="fa fa-users">&nbsp;</em>
                    Student Details
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?students"><em class="fa fa-users">&nbsp;</em>
                    Student Details
                </a>
            </li>
        <?php }
        if (isset($_GET['complain'])){ ?>
            <li class="active">
                <a href="index.php?complain"><em class="fa fa-comments">&nbsp;</em>
                    Manage Complaints
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?complain"><em class="fa fa-comments">&nbsp;</em>
                    Manage Maintenance
                </a>
            </li>
        <?php }
        if (isset($_GET['logout'])){ ?>
            <li class="active">
                <a href="home.php"><em class="fa fa-comments">&nbsp;</em>
                    Log Out
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="landing.php"><em class="fa fa-comments">&nbsp;</em>
                    Log Out
                </a>
            </li>
        <?php }
        ?>
        

        

        
    </ul>
</div><!--/.sidebar-->