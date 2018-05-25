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
                            $username = $_POST['username'];
                            $firstName = $_POST['fisrtName'];
                            $lastName = $_POST['lastName'];
                            $gender = $_POST['gender'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $language = $_POST['language'];

                         }
                        ?>
                        <div class="panel-body">
                                <?php
                                    if($user_info->role =='patient' ){
                                ?>
                                <form class="form-horizontal group-border stripped">
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
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Address</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->address ?>">
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
                                </form>                                                                                                                                                                          
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_info->role =='hospital' ){
                                ?>
                                <form class="form-horizontal group-border stripped">
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
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->firstName ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Last Name Admin</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->lastName ?>">
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
                                        <label class="col-lg-2 col-md-3 control-label" for="">Email Admin</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Address</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control" name="username" value="<?php echo $user_info->address ?>">
                                        </div>
                                    </div>                                                                                                            
                                </form>                                                                                                                                                                          
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_info->role =='doctor' ){
                                ?>
                                <form class="form-horizontal group-border stripped">
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
<?php 
require_once '../includes/footer.php';
?>