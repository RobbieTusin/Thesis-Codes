
<?php 
				ob_start();
				include('db.php');
				if(isset($_GET['signatoryid']))
				{
				  $signatoryid=$_GET['signatoryid'];

				  if(isset($_POST['update']))
				  {

						$fullname=$_POST['fullname'];
						$position=$_POST['position']; 
						
						

				  $updated=mysql_query("UPDATE signatories SET fullname='$fullname', position='$position' WHERE signatoryid='$signatoryid'")or die();
				  if($updated)
				  {
				  $msg="Successfully Updated!!";
				
				  header('Location:signatory.html');
				  }
				}
				}
				ob_end_flush();
				?>

			<?php 
				if(isset($_GET['signatoryid']))
				{
					$signatoryid=$_GET['signatoryid'];

					$getselect=mysql_query("SELECT * FROM signatories WHERE signatoryid='$signatoryid'");
					while($profile=mysql_fetch_array($getselect))
				{

					$fullname=$profile['fullname'];
					$position=$profile['position'];	
					
					
					
			?>	


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DND PBAC PPMS | Signatory Edit Form </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- Material Design -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="../../dist/css/ripples.min.css">
  <link rel="stylesheet" href="../../dist/css/MaterialAdminLTE.min.css">
  <!-- MaterialAdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/all-md-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

   <header class="main-header">
   
  	<!--------------------------------- MODAL --------------------------------->
	    <!-- Logo -->
    <a class="logo"  data-toggle="modal" data-target="#myModal">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P<b>P<b>M<b>S</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DND PBAC PPMS</b></span>
    </a>
	<!--------------------------------- MODAL ENDING--------------------------------->
	
		<!------------------------- Modal ------------------------->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Sure you want to go back to Main Page?</h4>
		  </div>
		  <div class="modal-body">
			This action will log out your account. Want to Continue?
		  </div>
		  <div class="modal-footer">
			<button class="btn btn-default" type="reset" data-dismiss="modal">Cancel</button>
			<button class="btn btn-primary" onclick="notifyMe()"><a href="/../DNDPPMS/index.html"> Go To Main Page </a></button>
		  </div>
		</div>
	  </div>
	</div>	
	<!--------------------------------- MODAL ENDING--------------------------------->
	
	
	 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

<!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/boy1.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['firstname'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/boy1.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['firstname'] ?> <br> <small> Position </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
				                  <div class="row">
                  <center>
                    <label>CHANGE</label>
                  </center>

                </div>
				
					<div class="btn col-xs-12">
							<a href="../PPMS/pages/tables/change_password.html"> Password </a>
					</div>	
				
				  <div class="form-group">
					<div class="btn col-xs-12">
							<input type="file" name="attachment" class="btn btn-default btn-flat"> Picture </input>
					</div>
					<p class="help-block">Max. 32MB</p>
				  </div>
				  
				</div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
             <li class="user-footer">
                <div class="pull-left">
                  <a href="../examples/lockscreen.html" class="btn btn-default btn-flat">Lock <i class="fa fa-lock"></i></a>
                </div>
                <div class="pull-right">
                  <a href="/../../DNDPPMS/index.html" class="btn btn-default btn-flat" onclick="notifyMe()?success:true">Sign out <i class="fa fa-sign-out"></i></a>
                </div>
              </li>
            </ul>
        </li>
		
<!-- Control Sidebar Toggle Button -->		
		
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/boy1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['firstname'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="../../index.html">
            <i class="fa fa-dashboard"></i> <span><B>BAC SECRETARIAT DASHBOARD</B></span>
          </a>
        </li>
		
		<li class="treeview">
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span><B>MAILBOX</B></span>
          </a>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>DATA ENTRY FORMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		      	  
			<li><a href="../examples/dataentry_enduser.html"><i class="fa fa-clipboard"></i> End User Offices   </a></li>
			<li><a href="../examples/dataentry_expenses.html"><i class="fa fa-clipboard"></i><b> Expenses   </b> </a></li>	
			<li><a href="../examples/dataentry_fiscalyear.html"><i class="fa fa-clipboard"></i> Fiscal Year  </a></li>
			<li><a href="../examples/dataentry_facts.html"><i class="fa fa-clipboard"></i> Frequently Ask Questions </a></li>
			<li><a href="../examples/dataentry_mode.html"><i class="fa fa-clipboard"></i> Mode of Procurement </a></li>
			<li><a href="../examples/dataentry_product.html"><i class="fa fa-clipboard"></i> Product </a></li>
			<li><a href="../examples/dataentry_procurement.html"><i class="fa fa-clipboard"></i> Procurement   </a></li>
			<li><a href="../examples/dataentry_projectname.html"><i class="fa fa-clipboard"></i> Project Name   </a></li>
			<li><a href="../examples/dataentry_quarter.html"><i class="fa fa-clipboard"></i> Quarter  </a></li>
			<li><a href="../examples/dataentry_signatory.html"><i class="fa fa-clipboard"></i> Signatory   </a></li>
			<li><a href="../examples/dataentry_supplier.html"><i class="fa fa-clipboard"></i> Supplier </a></li>
			<li><a href="../examples/dataentry_unit.html"><i class="fa fa-clipboard"></i> Unit   </a></li> 
			<li><a href="../examples/dataentry_dlCategory.html"><i class="fa fa-clipboard"></i> Downloadables Category   </a></li>		
          </ul>
        </li>
		<li>

				<a href="#"><i class="fa fa-pencil"></i> APP DATA ENTRY FORMS
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="../examples/encodeapp.html"><i class="fa fa-plus"></i><b>APP FORM-GPPB FORMAT</b> </a></li>
					<li><a href="../examples/deleteAPP.html"><i class="fa fa-trash-o fa-fw"></i><b>DELETE PMR</b> </a></li>
					<li><a href="../examples/updateAPP.html"><i class="fa fa-edit fa-fw"></i><b>UPDATE PMR</b> </a></li>					
				</ul>
            </li>
			<li>

              <a href="#"><i class="fa fa-pencil"></i> PMR DATA ENTRY FORMS
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
            <li><a href="../examples/encodePMR.html"><i class="fa fa-plus"></i><b> ADD PMR</b> </a></li>
			<li><a href="../examples/deletePMR.html"><i class="fa fa-trash-o fa-fw"></i><b>DELETE PMR</b> </a></li>
			<li><a href="../examples/updatePMR.html"><i class="fa fa-edit fa-fw"></i><b>UPDATE PMR</b> </a></li>
			
              </ul>
            </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>DATABASE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
			<li><a href="../tables/BacMembertable.html"><i class="fa fa-list"></i> BAC Member List View</a></li>
			<li><a href="../tables/endusertables.html"><i class="fa fa-list"></i> End User Offices List View</a></li>
			<li><a href="../tables/expensesform.php"><i class="fa fa-list"></i> Expense List View</a></li> 
			<li><a href="../tables/facts.html"><i class="fa fa-list"></i> FAQS List View</a></li>
			<li><a href="../tables/fiscalyear.html"><i class="fa fa-list"></i> Fiscal Year List View</a></li>
			<li><a href="../tables/dataentrytables.html"><i class="fa fa-list"></i> Mode of Procurement List View</a></li>
			<li><a href="../tables/procurementtables.html"><i class="fa fa-list"></i> Procurement List View</a></li>
			<li><a href="../tables/producttables.html"><i class="fa fa-list"></i> Product Details List View</a></li> 
			<li><a href="../tables/projectname.html"><i class="fa fa-list"></i> Project Name List View</a></li>
			<li><a href="../tables/quarter.html"><i class="fa fa-list"></i> Quarter List View</a></li> 
			<li><a href="../tables/signatory.html"><i class="fa fa-list"></i> Signatory List View</a></li>
			<li><a href="../tables/suppliertable.html"><i class="fa fa-list"></i> Supplier List View</a></li>
			<li><a href="../tables/unit.html"><i class="fa fa-list"></i> Units List View</a></li>    
			<li><a href="../tables/datatableAppGppb.html"><i class="fa fa-list"></i> APP GPPB  </a></li>  
			<li><a href="../copyright/copyright.html"><i class="fa fa-list"></i> Version  </a></li> 		
             <!-- <li>
              <a href="#"><i class="fa fa-folder"></i> APP DATABASE
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
            <li><a href="../PPMS/pages/tables/expensesform.php"><i class="fa fa-circle-o"></i> <b>Expenses List View </b></a></li>
			<li><a href="../PPMS/pages/tables/particularslistview.html"><i class="fa fa-circle-o"></i> <b>Particulars List View </b></a></li>
              </ul>
            </li> -->
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span><B>REPORTS</B></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  
          <ul class="treeview-menu">
			<li>
              <a href="#"><i class="fa fa-folder"></i> ANNUAL PROCUREMENT PLAN
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
            <li><a href="../reports/APP_Itemized.html"><i class="fa fa-file-text-o"></i><b>ITEMIZED</b> </a></li>	
			<li><a href="../reports/GPPB.html"><i class="fa fa-file-text-o"></i><b>GPPB FORMAT</b> </a></li>	
			<li><a href="../reports/APP_Summarized.html"><i class="fa fa-file-text-o"></i><b>SUMMARIZED</b> </a></li>	
              </ul>
			   
              <a href="#"><i class="fa fa-folder"></i> PMR Reports
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
			 <li><a href="../reports/PMR.html"><i class="fa fa-file-text-o"></i><b>Procurement Monitoring Report</b> </a></li>	
			
			
              </ul>
            </li>
            </li> 
		  </ul>
		   
        </li>
		
		 <li>
          <a href="../../files.html">
            <i class="fa fa-upload"></i> <span><B>UPLOADS</B></span>
          </a>
        </li> 
		
		<li>
          <a href="../../gallery.html">
            <i class="fa fa-picture-o"></i> <span><B>GALLERY</B></span>
          </a>
        </li>
		
        <li>
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span><B>CALENDAR</B></span>
          </a>
        </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><b>Signatory details Edit Form </b></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Signatory details Edit Form </b></h3>
        </div>
        <div class="box-body">
          
                                    <form action="" method="post" name="insertform">
										<div class="form-group">
											<label for="name"  id="preinput"> <b> Full Name: </b> </label>
											<input type="text" name="fullname" required placeholder="Enter Full Name " 
											value="<?php echo $fullname; ?>" id="inputid" class="form-control"/>
                                        </div>
										<div class="form-group">
                                            <label for="name"  id="preinput"> <b> Position : </b> </label>
											<input type="text" name="position" required placeholder="Enter Position : " 
											value="<?php echo $position; ?>" id="inputid" class="form-control"/>
                                        </div>						

										<button type="submit" name="update" value="update" id="inputid" class="btn btn-primary btn-raised" /> Submit </button>
                                    </form>
										
        </div>

			<?php } } ?>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
   <strong>Copyright &copy; 2017 - DND PBAC PPMS by 3R&M &trade;. </strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="../../dist/js/material.min.js"></script>
<script src="../../dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$signatoryid = $_POST['signatoryid'];
    $fullname = $_POST['fullname'];
	$position = $_POST['position'];

	
}
?>

