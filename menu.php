<?php
$type1 = 'Simpleuser';
$type2 = 'admin';
// navbar-light bg-light

if (isset($_SESSION['type']) == true) {
  $type = $_SESSION['type'];

  if ($type == $type2) {
?>
<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="admin.php"><i class="menu-icon 	fa fa-user"></i>Profile
                </a></li>
            <!-- <li><a href="message.php"><i class="menu-icon fa fa-inbox"></i>Messages</a> -->
            </li>
            <li><a href="adminusers.php"><i class="menu-icon fa fa-users"></i>Manage Students </a>
            </li>
            <li><a href="adminbooks.php"><i class="menu-icon fa fa-book"></i>All Books </a></li>
            <li><a href="addbook.php"><i class="menu-icon fa fa-plus"></i>Add Books </a></li>
            <!-- <li><a href="requests.php"><i class="menu-icon fa fa-tasks"></i>Issue/Return Requests </a></li>
            <li><a href="recommendations.php"><i class="menu-icon fa fa-list-ol"></i>Book Recommendations</a></li>
            <li><a href="current.php"><i class="menu-icon fa fa-bars"></i>Currently Issued Books </a> -->
            </li>
        </ul>

    </div>
</div>
<?php
}elseif ($type == $type1){
    ?>
    <div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="user.php"><i class="menu-icon 	fa fa-user"></i>Profile
                </a></li>
            <!-- <li><a href="message.php"><i class="menu-icon fa fa-inbox"></i>Messages</a> -->
            </li>
            <li><a href="userissuedbooks.php"><i class="menu-icon fa fa-users"></i>Currently Borrowes Books </a>
            </li>
            <!-- <li><a href="adminbooks.php"><i class="menu-icon fa fa-book"></i>All Books </a></li>
            <li><a href="addbook.php"><i class="menu-icon fa fa-plus"></i>Add Books </a></li> -->
            <!-- <li><a href="requests.php"><i class="menu-icon fa fa-tasks"></i>Issue/Return Requests </a></li>
            <li><a href="recommendations.php"><i class="menu-icon fa fa-list-ol"></i>Book Recommendations</a></li>
            <li><a href="current.php"><i class="menu-icon fa fa-bars"></i>Currently Issued Books </a> -->
            </li>
        </ul>

    </div>
</div>
<?php
}
}
?>