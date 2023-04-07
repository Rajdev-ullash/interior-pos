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
<?php 
						include_once('databases.php');
                         $oldheader = "";
                         $thisheader = "";
                         $level=$_SESSION['ulevel'];
                         $output='';
                         
                         if ($level=='1') {
                           $menuquery = "SELECT * FROM menu WHERE status='1' ORDER BY menuorder";  

                         } else if($level=='2') {
                           $menuquery = "SELECT * FROM menu WHERE status='1' AND access='2' ORDER BY menuorder";  
                         }else if($level=='3') {
                           $menuquery = "SELECT * FROM menu WHERE status='1' AND access='3' ORDER BY menuorder";  
                         }
                         
                         
                         $menuresult = mysqli_query($connection, $menuquery); 
                         $i = 1;
                          $output='<ul class="nav sub-menu mt-2"><li class="nav-item nav-category mt-3 mb-3">Main</li><li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="link-icon" data-feather="box"></i><span class="link-title">Dashboard</span></a>
                          </li><li class="nav-item nav-category mt-3 mb-3">MODULES</li>';
                         while($row = mysqli_fetch_array($menuresult)){
                         
                         $thisheader=$row["head"];
                         if($thisheader!=="hidden"){
                        if(strcmp($oldheader, $thisheader)!=0){
                        if ($i>1){
                       	$output.='</ul></li>';
                        
                        }
                        $output.='<li class="mb-3 nav-item">';
                        $output.='<a class="nav-link" data-bs-toggle="collapse" href="#uiComponents'.ucwords($thisheader).'" role="button" aria-expanded="false"
		                    aria-controls="uiComponents">
		                    <i class="link-icon" data-feather="truck"></i>
		                    <span class="link-title">'.ucwords($thisheader).'</span><i class="link-arrow me-3" data-feather="chevron-down"></i></a>';
                        $output.='<div class="collapse" id="uiComponents'.ucwords($thisheader).'">';
                        $output.= '<ul class="nav sub-menu">';
                        
                        $oldheader = $thisheader;
                        }
                          $link = $row["link"];
                          $text = $row["menutext"];
                          $filename=$link.".php";
                          if(strcmp(basename($_SERVER['PHP_SELF']),$filename)!=0){
                            if($link=='so_view'&&($level=='3'||$level=='4')){
                              $output.='<li class="nav-item mt-2"><a href="'.$filename.'" class="nav-link">'.$text.'</a></li>';
                            }else if($link=='user_pass_change'&&($level=='2'||$level=='3'||$level=='4')){
                              $output.='<li class="nav-item mt-2"><a href="'.$filename.'" class="nav-link">'.$text.'</a></li>';
                            }else{
                              $output.='<li class="nav-item mt-2"><a href="'.$filename.'" class="nav-link">'.$text.'</a></li>';
                            }
                          }else{
                          $output.='<li class="nav-item"><a href="#" class="nav-link">'.$text.'</a></li>';
                          }
                         
                           $i++;
                        }
                       } 
                       $output.='</ul>';
                        $output.='</div>';
                       ?>
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            CAR<span>CODE</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <?php echo $output;?>
    </div>
</nav>


<!-- <div class="main-menu-content">

		    


		</div> -->
<!-- /main menu content-->
<!-- main menu footer-->
<!-- include includes/menu-footer-->
<!-- main menu footer-->
<!-- </div> -->