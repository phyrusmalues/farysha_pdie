<?PHP include('header.php'); ?>
<?php
include_once "db.php";?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Student</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
    
        <?php 
        if (isset($_GET['checkin'])){ ?>
            <li class="active">
            <a href="checkin.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Check In
                </a>
            </li>
        <?php } else{?>
            <li>
             <a href="checkin.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Check In
                </a>
            </li>
        <?php }?>

        <?php 
    
        if (isset($_GET['checkout'])){ ?>
            <li class="active">
            <a href="checkout.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Check Out
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="checkout.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Check Out
                </a>
            </li>
        <?php }?>


        <?php 
        if (isset($_GET['inventori'])){ ?>
            <li class="active">
            <a href="inventori.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Inventory List
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="inventori.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Inventory List
                </a>
            </li>
        <?php }?>


        <?php 
        if (isset($_GET['studcomplain'])){ ?>
            <li class="active">
            <a href="studcomplain.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Request Maintenance
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="studcomplain.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Request Maintenance
                </a>
            </li>
        <?php }?>
        <?php 
        if (isset($_GET['logout'])){ ?>
            <li class="active">
            <a href="landing.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Log out
                </a>
            </li>
        <?php } else{?>
            <li>
             <a href="landing.php?"><em class="fa fa-calendar">&nbsp;</em>
                    Log out
                </a>
            </li>
        <?php }?>
        

</div><!--/.sidebar-->