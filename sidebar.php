<style type="text/css">
.sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link::before {
    border: none !important;
    background: none !important;
}

.sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link::after {
    border: none !important;
    background: none !important;
}

.sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link:hover {
    border: none !important;
    list-style: none !important;
    background: none !important;
}

.sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link:active {
    border: none !important;
    list-style: none !important;
}
</style>


<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            P&amp;G<span> TEXTILE</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">MODULES</li>
            <?php
                        require_once('databases.php');
                         $oldheader = "";
                         $thisheader = "";
                         $level=$_SESSION['ulevel'];
                         $output='';
                         
                         if ($level=='1') {
                           $menuquery = "SELECT * FROM menu WHERE status='Active' ORDER BY menuorder";  

                         } else if($level=='2') {
                           $menuquery = "SELECT * FROM menu WHERE status='Active' AND access='2' ORDER BY menuorder";  
                         }else if($level=='3') {
                           $menuquery = "SELECT * FROM menu WHERE status='Active' AND access='3' ORDER BY menuorder";  
                         }     
                         $menuresult = mysqli_query($connection, $menuquery); 
                         $i=1;
                        while($row = mysqli_fetch_array($menuresult)){
                         
                        $thisheader=$row["head"];
                        // if($thisheader!=="hidden"){
                        if(strcmp($oldheader, $thisheader)!=0){
                        if ($i>1){
                        ?>
        </ul>
    </div>
    </li>
    <?php
                        }          
          ?>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#<?php echo ucwords($thisheader);?>" role="button"
            aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="<?php echo $row["icon"];?>"></i>
            <span class="link-title"><?php echo ucwords($thisheader);?></span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="<?php echo ucwords($thisheader);?>">
            <ul class="nav sub-menu">
                <?php
                $oldheader = $thisheader;
               }
               $link = $row["link"];
               $text = $row["menutext"];
               $filename=$link.".php";
               ?>
                <li class="nav-item">
                    <a href="<?php echo $filename;?>" class="nav-link"><?php echo $text;?></a>
                </li>
                <?php
              $i++;
              }
              ?>

            </ul>
        </div>
    </li>


    </ul>
    </div>
</nav>


<!-- <div class="main-menu-content">

		    


		</div> -->
<!-- /main menu content-->
<!-- main menu footer-->
<!-- include includes/menu-footer-->
<!-- main menu footer-->
<!-- </div> -->