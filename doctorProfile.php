<?
    require_once 'core/config.php';
    require_once 'core/curllib.php';
    session_start();
    $linkapi= API.'/api/user/doctorprofile?id='.$_GET['id'];
    $doctor_info = json_decode(hellcatget($linkapi));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DoctorProfile</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
        <!-- Css files -->
        <!-- Icons -->
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="css/custom.css" rel="stylesheet" />
        <meta name="msapplication-TileColor" content="#3399cc" />
        <style>
.demo-bg{
background: #ffac0c;
margin-top: 60px;
}
.business-hours {
background: #222; 
padding: 40px 14px;
margin-top: -15px;
position: relative;
}
.business-hours:before{
content: '';
width: 23px;
height: 23px;
background: #111;
position: absolute;
top: 5px;
left: -12px;
transform: rotate(-45deg);
z-index: -1;
}
.business-hours .title {
font-size: 20px;
color: #BBB;
text-transform: uppercase;
padding-left: 5px;
border-left: 4px solid #ffac0c; 
}
.business-hours li {
color: #888;
line-height: 30px;
border-bottom: 1px solid #333; 
}
.business-hours li:last-child {
border-bottom: none; 
}
.business-hours .opening-hours li.today {
color: #ffac0c; 
}        
        </style>
    </head>
    <body class="container-fluid" style="padding-top:50px;">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default" id="supr0">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Profile details</h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">
                        <!-- Start .row -->
                        <div class="col-md-4">
                            <div class="profile-avatar">
                                <img src="img/avatars/128.jpg" alt="Avatar">
                                <p class="mt10">
                                    Online
                                    <span class="device">
                                                <i class="fa fa-mobile s16"></i>
                                            </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="profile-name">
                                <h3><?php echo $doctor_info->data->firstName.' '.$doctor_info->data->lastName ?></h3>
                                <p class="job-title mb0"><i class="fa fa-building"> <?php echo $doctor_info->data->hospitalName?></i></p>
                                <br>
                                <a href="profile.html#" class="btn btn-primary btn-large mr10"> <i class="fa fa-envelope"></i> Send email</a>
                                <a href="profile.html#" class="btn btn-default btn-alt btn-large">Bookmark</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="profile-info bt">
                                <div class="container demo-bg">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <dl class="mt20">
                                                <dt class="text-muted">Gender</dt>
                                                <dd><?php echo $doctor_info->data->gender?></dd>                                        
                                                <dt class="text-muted">Degree</dt>
                                                <dd><?php echo $doctor_info->data->degree?></dd>
                                                <dt class="text-muted">Acpected Insurance</dt>
                                                <dd><?php echo $doctor_info->data->acceptedInsurance?></dd>
                                            </dl>                                         
                                        </div>
                                        <div class="col-sm-4">
                                            <dl class="mt20">
                                                <dt class="text-muted">Email</dt>
                                                <dd><?php echo $doctor_info->data->email?></dd>
                                                <dt class="text-muted">Language</dt>
                                                <dd><?php echo $doctor_info->data->languages?></dd>
                                            </dl>                                        
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="business-hours">
                                                <h2 class="title">Working Hours</h2>
                                                <ul class="list-unstyled opening-hours">
                                                    <li>Sunday <span class="pull-right"><?php echo $doctor_info->workingHours->sunday?></span></li>
                                                    <li>Monday <span class="pull-right"><?php echo $doctor_info->workingHours->monday?></span></li>
                                                    <li>Tuesday <span class="pull-right"><?php echo $doctor_info->workingHours->tuesday?></span></li>
                                                    <li>Wednesday <span class="pull-right"><?php echo $doctor_info->workingHours->wednesday?></span></li>
                                                    <li>Thursday <span class="pull-right"><?php echo $doctor_info->workingHours->thursday?></span></li>
                                                    <li>Friday <span class="pull-right"><?php echo $doctor_info->workingHours->friday?></span></li>
                                                    <li>Saturday <span class="pull-right"><?php echo $doctor_info->workingHours->saturday?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                </div>
            </div>
        </div>        
        <!-- Javascripts -->
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="http://demos.getbootstrapkit.com/supr/assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="http://demos.getbootstrapkit.com/supr/assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!-- Form plugins -->
        <script src="plugins/forms/validation/jquery.validate.js"></script>
        <script src="plugins/forms/validation/additional-methods.min.js"></script>
        <!-- Init plugins olny for this page -->
        <script src="js/pages/login.js"></script>
    </body>
</html>