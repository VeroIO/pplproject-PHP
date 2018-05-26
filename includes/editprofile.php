<?php 
require_once '../includes/header.php';
?>
        <div class="col-md-6 col-md-offset-3">
            <div id="content">
                <div id="contentwrapper">
                    <div class="panel panel-default toggle panelClose panelRefresh panelMove" id="tokendiv" style="margin-top: 10px;">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title">Bảng Chỉnh Sửa Thông Tin Người Dùng</h4>
                            <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="brocco-icon-refresh s12"></i></a><a href="#" class="toggle panel-minimize"><i class="icomoon-icon-plus"></i></a><a href="#" class="panel-close"><i class="icomoon-icon-close"></i></a></div>
                        </div>
                        <?php
                        require_once '../core/curllib.php';
                        if($_POST['role']=='patient' ){
                            $api_url=API.'/api/user/update_patient?access_token='.$_SESSION['jwt'];
                            $post_data = [
                                'firstName' => $_POST['firstName'],
                                'lastName' => $_POST['lastName'],
                                'gender' => $_POST['gender'],
                                'email' => $_POST['email'],
                                'address' => $_POST['address'],
                                'language' => $_POST['language'],                                
                            ];
                            $res=hellcatpost($api_url,$post_data);
                            $res=json_decode($res);
                         }elseif ($_POST['role']=='hospital') {
                            $api_url=API.'/api/user/update_hospital?access_token='.$_SESSION['jwt'];
                            $post_data = [
                                'hospitalName' => $_POST['hospitalName'],
                                'firstName' => $_POST['firstName'],
                                'lastName' => $_POST['lastName'],
                                'email' => $_POST['email'],
                                'address' => $_POST['address'],                              
                            ];
                            $res=hellcatpost($api_url,$post_data);
                            $res=json_decode($res);                                                    
                         }elseif ($_POST['role']=='doctor'){
                            $api_url=API.'/api/user/update_doctor?access_token='.$_SESSION['jwt'];
                            $post_data = [
                                'firstName' => $_POST['firstName'],
                                'lastName' => $_POST['lastName'],
                                'gender' => $_POST['gender'],
                                'degree' => $_POST['degree'],
                                'acceptedInsurance' => $_POST['acceptedInsurance'],
                                'email' => $_POST['email'],
                                'language' => $_POST['language'],                             
                            ];
                            $res=hellcatpost($api_url,$post_data);
                            $res=json_decode($res);                                                        
                         }
                        ?>
                        <div class="panel-body">
                                <?php
                                    var_dump($_POST);
                                    if($res->type == 'success'){
                                        echo '<div class="alert alert-success">
                                                '.$res->message.'
                                            </div>';
                                    }elseif($res->type == 'error'){
                                        echo '<div class="alert alert-danger">
                                                '.$res->message.'
                                            </div>';                                    
                                    }
                                ?>
                                <?php
                                    if($user_info->role =='patient' ){
                                ?>
                                <form class="form-horizontal group-border stripped" method="POST">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Tài Khoản</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->userName ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Loại người dùng</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="role" value="<?php echo $user_info->role ?>" disabled>
                                            <input type="hidden" class="form-control" name="role" value="<?php echo $user_info->role ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">First Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="firstName" value="<?php echo $user_info->firstName ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Last Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="lastName" value="<?php echo $user_info->lastName ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Gender</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Email</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="email" value="<?php echo $user_info->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Address</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="address" value="<?php echo $user_info->address ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Language</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select class="form-control" name="language">
                                                <option value="vi">vi</option>
                                                <option value="en">en</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary pull-right" type="submit">Lưu</button>                                                                                                                                                
                                </form>                                                                                                                                                                          
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_info->role =='hospital' ){
                                ?>
                                <form class="form-horizontal group-border stripped" method="POST">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Tài Khoản</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->userName ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Loại người dùng</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="role" value="<?php echo $user_info->role ?>" disabled>
                                            <input type="hidden" class="form-control" name="role" value="<?php echo $user_info->role ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Hospital Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="hospitalName" value="<?php echo $user_info->hospitalName ?>">
                                        </div>
                                    </div>                                     
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">First Name Admin</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="firstName" value="<?php echo $user_info->firstName ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Last Name Admin</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="lastName" value="<?php echo $user_info->lastName ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Email Admin</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="email" value="<?php echo $user_info->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Address</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="address" value="<?php echo $user_info->address ?>">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary pull-right">Lưu</button>                                                                                                           
                                </form>                                                                                                                                                                          
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_info->role =='doctor' ){
                                ?>
                                <form class="form-horizontal group-border stripped" method="POST">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Tài Khoản</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->userName ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Loại người dùng</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="role" value="<?php echo $user_info->role ?>" disabled>
                                            <input type="hidden" class="form-control" name="role" value="<?php echo $user_info->role ?>">
                                        </div>
                                    </div>                                 
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">First Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="firstName" value="<?php echo $user_info->firstName ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Last Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="lastName" value="<?php echo $user_info->lastName ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Gender</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Email</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="email" value="<?php echo $user_info->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Degree</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="degree" value="<?php echo $user_info->degree ?>">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Accepted insurance</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="acceptedInsurance" value="<?php echo $user_info->acceptedInsurance ?>">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Language</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select class="form-control" name="language">
                                                <option value="vi">vi</option>
                                                <option value="en">en</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Monday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="monday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="monday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Tuesday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="tuesday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="tuesday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Wednesday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="wednesday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="wednesday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Thursday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="thursday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="thursday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="col-lg-2 col-md-3 control-label" for="">Friday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="friday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="friday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                         <label class="col-lg-2 col-md-3 control-label" for="">Saturday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="saturday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="saturday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Sunday</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="sunday_start" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">To</div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td><td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td></tr><tr><td><input type="text" class="bootstrap-timepicker-hour form-control" maxlength="2"></td> <td class="separator">:</td><td><input type="text" class="bootstrap-timepicker-minute form-control" maxlength="2"></td> <td class="separator">&nbsp;</td><td><input type="text" class="bootstrap-timepicker-meridian form-control" maxlength="2"></td></tr><tr><td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td></tr></tbody></table></div>
                                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                <input name="sunday_end" type="text" class="form-control default-timepicker">
                                            </div>
                                        </div>
                                    </div>                                                                       
                                    <button class="btn btn-primary pull-right">Lưu</button>                                                                                                                                                                                   
                                </form>                                                                                                                                                                          
                                <?php
                                    }
                                ?>                                                               
                        </div>
                        <!-- <?php var_dump($_SESSION['jwt']) ?> -->
                        <div class="panel-footer">Code By <a href="https://www.facebook.com/hellcat.info">HellCatVN</a></div>
                    </div>
                </div>
            </div>
        </div>
 </div>
<script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js"></script>
<script>
 //------------- Timepicker -------------//
    $('.default-timepicker').timepicker({
        upArrowStyle: 'fa fa-angle-up',
        downArrowStyle: 'fa fa-angle-down',
    });
</script>
<?php 
require_once '../includes/footer.php';
?>