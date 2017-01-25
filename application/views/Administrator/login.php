
<html>
<head>
    <title>IMASKADUTA | Ikatan Mahasiswa Alumni SMK Negeri 2 Surakarta</title>
    <?php include "header.php"; ?>
    <script src="<?php echo base_url('bootstrap/js/jquery.js')?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
</head>
<body style="background :#f2f2f2">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <img alt="Brand" src="<?=base_url();?>bootstrap/image/imaskaduta_besar.png" class="logo-login">
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="col-md-12" style="background : #fff; border:1px solid #afceff; border-radius : 10px; padding : 30px 60px;">
                <form action="<?=base_url()?>index.php/Administrator/Login/CekLogin" id="form" class="form-horizontal" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="desc">email</label>
                                    <input class="form-control" id="email" name="email" placeholder="Email yang telah didaftarkan." type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="desc">&nbsp;&nbsp;&nbsp;password</label>
                                    <input class="form-control" id="pass" name="pass" placeholder="" type="password" style="margin-left : 10px;"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="<?=site_url('startPage')?>">I dont have account.</a> <b>or</b>
                                <a href="<?=site_url('administrator/forgetPassword')?>">I forget my password.</a>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" id="btnLogin" class="btn btn-primary" style="float:right;">Log In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>