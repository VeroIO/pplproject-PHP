<?php 
    require_once '../includes/header.php';
?>
        <div class="col-md-6 col-md-offset-3">
            <div id="content">
                <div id="contentwrapper">
                    <div class="panel panel-default toggle panelClose panelRefresh panelMove" id="tokendiv" style="margin-top: 10px;">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title">Thay Đổi Mật Khẩu</h4>
                            <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="brocco-icon-refresh s12"></i></a><a href="#" class="toggle panel-minimize"><i class="icomoon-icon-plus"></i></a><a href="#" class="panel-close"><i class="icomoon-icon-close"></i></a></div>
                        </div>
                        <div class="panel-body">
                        <?php
                            require_once '../core/curllib.php';
                            if($_POST){
                                $api_url=API.'/api/user/changepassword?access_token='.$_SESSION['jwt'];
                                $post_data = [
                                    'newpassword' => $_POST['newPassword'],
                                    'repassword' => $_POST['renewPassword'],
                                    'current_password' =>$_POST['currentPassword']
                                ];
                                $res=hellcatpost($api_url,$post_data);
                                $res=json_decode($res);
                                if($res->type == 'success'){
                                    echo '<div class="alert alert-success">
                                            '.$res->message.'
                                        </div>';
                                }else{
                                    echo '<div class="alert alert-danger">
                                            '.$res->message.'
                                        </div>';                                    
                                }
                            }
                        ?>                        
                            <form class="form-horizontal group-border stripped" method="POST">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">Mật Khẩu Hiện Tại</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="password" class="form-control" value="" name="currentPassword">
                                    </div>
                                                                     
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">Mật Khẩu Mới</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="password" class="form-control" value="" name="newPassword">
                                    </div>                                       
                                </div>  
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">Xác Nhận Mật Khẩu Mới</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="password" class="form-control" value="" name="renewPassword">
                                    </div> 
                                </div>                          
                                <br>
                                <button type="submit" class="btn btn-primary center-block">Lưu</button>                                   
                            </form>
                        </div>
                        <div class="panel-footer">Code By <a href="https://www.facebook.com/hellcat.info">HellCatVN</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    require_once '../includes/footer.php';
?>