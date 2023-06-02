<head>
    <style>
        .act{
            background-color: #00458c ;
            color: white !important;
        }
    </style>
</head>

<?php
$type1 = 'Simpleuser';
$type2 = 'admin';
$type3 = 'Simpleadmin';
// navbar-light bg-light

if (isset($_SESSION['type']) == true) {
  $type = $_SESSION['type'];

  if ($type == $type2 || $type == $type3 ) {
?>
<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li><a href="/project/admin/admin.php"><i class="menu-icon fa fa-user"></i>Profile
                </a></li>
            <!-- <li><a href="message.php"><i class="menu-icon fa fa-inbox"></i>Messages</a> -->
            </li>
            <li><a href="/project/admin/adminusers.php"><i class="menu-icon fa fa-users"></i>Manage Users </a>
            </li>
            <li><a href="/project/admin/adminadd.php"><i class="menu-icon fa fa-plus"></i>Add Admin</a></li>
            <li><a href="/project/admin/adminbooks.php"><i class="menu-icon fa fa-book"></i>Manage Books </a></li>
            <li><a href="/project/admin/addbook.php"><i class="menu-icon fa fa-plus"></i>Add Books </a></li>
            <li><a href="/project/admin/reservedbooks.php"><i class="menu-icon fa fa-check"></i>Reserved Books </a></li>
            <li><a href="/project/admin/bookreview.php"><i class="menu-icon fa fa-list-ol"></i>Book Recommendations</a></li>
            <li><a href="/project/admin/issuedbooks.php"><i class="menu-icon fa fa-bars"></i>Issued/Returned Books </a>
            </li>
        </ul>

    </div>
</div>


<?php
}elseif ($type == $type1 ){
    ?>
    <div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li><a href="/project/users/user.php"><i class="menu-icon 	fa fa-user"></i> Profile
                </a></li>
            <!-- <li><a href="message.php"><i class="menu-icon fa fa-inbox"></i>Messages</a> -->
            </li>
            <li><a href="/project/users/issuedbooks.php"><i class="menu-icon fa fa-users"></i> Borrowed Books </a>
            </li>
            <li><a href="/project/users/reserved.php"><i class="menu-icon fa fa-undo"></i> Reserved Books </a></li>
            <!-- <li><a href="#"><i class="menu-icon fa fa-list-ol"></i>Book Recommendations</a></li> -->
          
            </li>
        </ul>

    </div>
    

</div>


<?php
}
}
?>

<script>
  // Get the current page URL
  var currentURL = window.location.href;

  // Get all anchor elements inside the sidebar
  var sidebarLinks = document.querySelectorAll('.widget-menu a');

  // Loop through each anchor element
  sidebarLinks.forEach(function(link) {
    // Check if the link's href matches the current URL
    if (link.href === currentURL) {
      // Add the 'active' class to the link's parent <li> element
      link.classList.add('act');
      link.parentNode.classList.add('act');
    }
  });
</script>