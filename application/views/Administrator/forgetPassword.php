
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
            <form action="#" id="form" class="form-horizontal">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desc">email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email yang telah didaftarkan." type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="#">I have account.</a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" id="btnSend" onclick="send()" class="btn btn-primary" style="float:right;">Reset Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>


<script>
    function send()
    {
        console.log($('[name="email"]').val());
       $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        var email = $('[name="email"]').val();

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('administrator/forgetPassword/ajax_generate_password')?>",
            type: "POST",
            data : "email="+$('[name="email"]').val(),
            dataType: "JSON",
            success: function(data)
            {
                alert('Password telah di reset. Segera cek email Anda.');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>

</body>
</html>