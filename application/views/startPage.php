<html>
<head>
    <title>IMASKADUTA | Ikatan Mahasiswa Alumni SMK Negeri 2 Surakarta</title>
    <?php include "header.php"; ?>
</head>
<body>

       <nav class="navbar navbar-default navbar-fixed-top menu-atas">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"  >
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="<?=base_url();?>bootstrap/image/imaskaduta_header.png" class="header-image">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#apa-itu" class="smoothScroll">Apa itu IMASKADUTA ?</a></li>
                        <li><a href="#daftar" class="smoothScroll">Daftar sebagai anggota</a></li>
                        <li><a href="<?=base_url();?>index.php/dataAlumni"> anggota IMASKADUTA</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

       <div class="row" id="apa-itu" style="margin : 0px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-2 col-xs-2"></div>
                <div class="col-md-6 col-sm-8 col-xs-8">
                    <img src="<?=base_url();?>bootstrap/image/imaskaduta_awal.png" class="start-image-top">
                </div>
                <div class="col-md-3 col-sm-2 col-xs-2"></div>
            </div>
            <div class="row">
                <div class="col-md-12 start-text-1">
                    Selamat Datang Mahasiswa Alumni SMK Negeri 2 Surakarta
                    <br>
                    Selamat Bergabung bersama Kami di <b>IMASKADUTA</b>
                </div>
                <div class="col-md-12 start-text-2">
                    Di sini kita akan saling berbagi, saling bekerja sama untuk membantu adik-adik dan teman-teman kita agar dapat merasakan dunia perkuliahan seperti apa yang kita rasakan saat ini.
                </div>
            </div>
        </div>
       </div>

       <div class="row" id="success" style="margin : 0px;">
           <div class="col-md-1"></div>
           <div class="col-md-10">
               <div class="row">
                   <div class="col-md-4 col-sm-2 col-xs-2"></div>
                   <div class="col-md-4 col-sm-8 col-xs-8">
                       <img src="<?=base_url();?>bootstrap/image/imaskaduta_besar_panjang.png" class="start-image2">
                   </div>
                   <div class="col-md-4 col-sm-2 col-xs-2"></div>
               </div>
               <br>
               <div id="alert-msg">
                   <div class="alert alert-success text-center">Selamat ! Anda telah menjadi bagian dari Ikatan Mahasiswa Alumni SMK Negeri 2 Surakarta. Akun Anda telah aktif.</div>
                   <div class="col-md-3 col-sm-2 col-xs-0"></div>
                   <div class="col-md-3 col-sm-4 col-xs-6">
                        <input class="btn btn-primary" id="register-again" name="register-again" type="button" value="Daftarkan Akun Baru" />
                   </div>
                   <div class="col-md-3 col-sm-4 col-xs-6 split">
                       <a href="<?=base_url();?>index.php/dataAlumni"><input class="btn btn-info" id="" name="" type="button" value="Lihat Data Alumni" /></a>
                   </div>
                   <div class="col-md-3 col-sm-2 col-xs-0"></div>
               </div>
           </div>
           <div class="col-md-1"></div>
       </div>

       <div class="row" id="daftar" style="margin : 0px;">
           <div class="col-md-1"></div>
           <div class="col-md-10">
               <div class="row">
                   <div class="col-md-4 col-sm-2 col-xs-2"></div>
                   <div class="col-md-4 col-sm-8 col-xs-8">
                       <img src="<?=base_url();?>bootstrap/image/imaskaduta_besar_panjang.png" class="start-image">
                   </div>
                   <div class="col-md-4 col-sm-2 col-xs-2"></div>
               </div>
               <br>
               <div class="row">
                   <div class="col-md-12 start-text-3">
                       FORM PENDAFTARAN ANGGOTA IMASKADUTA
                   </div>
               </div>
               <br>
               <div id="alert-msg"></div>
               <?php
                    $attributes = array("name" => "contact_form", "id" => "contact_form");
                    echo form_open("StartPage/register", $attributes);
               ?>
               <div class="row">
                   <div class="col-md-6 col-sm-12 col-xs-12">
                       <div class="col-md-0 col-sm-1 col-xs-0"></div>
                       <div class="col-md-12 col-sm-10 col-xs-12">
                           <div class="form-group">
                               <label for="desc">NIS<div class="alert-nis empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa sewaktu SMK" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Nama<div class="alert-nama empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">No. Telp / HP <div class="alert-telp empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="telp" name="telp" placeholder="No. Telepon / HP Aktif" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Email <div class="alert-email empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="email" name="email" placeholder="alamat Email Aktif" type="text" required/>
                           </div>
                           <div class="form-group">
                               <div class="row">
                                    <div class="col-md-8">
                                        <label for="desc">Jurusan <div class="alert-jurusan_smk empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                                        <select name="jurusan_smk" id="jurusan_smk" class="form-control" required>
                                            <option value="Teknik Gambar Bangunan (TGB)">Teknik Gambar Bangunan (TGB)</option>
                                            <option value="Teknik Konstruksi Kayu (TKK)">Teknik Konstruksi Kayu (TKK)</option>
                                            <option value="Teknik Konstruksi Batu dan Beton (TKBB)">Teknik Konstruksi Batu dan Beton (TKBB)</option>
                                            <option value="Teknik Audio Video (TAV)">Teknik Audio Video (TAV)</option>
                                            <option value="Teknik Instalasi Tenaga Listrik (TITL)">Teknik Instalasi Tenaga Listrik (TITL)</option>
                                            <option value="Teknik Pemesinan (TPM)">Teknik Pemesinan (TPM)</option>
                                            <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (TKR)</option>
                                            <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                                            <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                                        </select>
                                    </div>
                                   <div class="col-md-4">
                                       <label for="desc">Kelas <div class="alert-kelas empty" style="display : none; margin : 0px !important;">Kolom ini tidak boleh kosong</div></label>
                                       <input class="form-control" id="kelas" name="kelas" placeholder="kelas di SMK (A/B/..)" type="text" required/>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="desc">Tahun Lulus <div class="alert-tahun_lulus empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="tahun lulus" type="text" required/>
                           </div>
                       </div>
                       <div class="col-md-0 col-sm-1 col-xs-0"></div>
                   </div>
                   <div class="col-md-6 col-sm-12 col-xs-12">
                       <div class="col-md-0 col-sm-1 col-xs-0"></div>
                       <div class="col-md-12 col-sm-10 col-xs-12 singgel">
                           <div class="form-group">
                               <label for="desc">Pendidikan Tinggi Saat Ini <div class="alert-perguruan_tinggi empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="perguruan_tinggi" class="ui-autocomplete-input" name="perguruan_tinggi" placeholder="Perguruan Tinggi yang ditempuh" type="text"  required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Jenjang Pendidikan <div class="alert-jenjang empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <select name="jenjang" id="jenjang" class="form-control"  required>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1/D4">S1/D4</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="desc">Jurusan / Program Studi yang Ditempuh<div class="alert-jurusan_kuliah empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="jurusan_kuliah" name="jurusan_kuliah" placeholder="Jurusan / Program Studi yang Ditempuh" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Kota Domisili<div class="alert-kota_domisili empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <input class="form-control" id="kota_domisili" name="kota_domisili" placeholder="Wilayah / Domisili saat Kuliah" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Alamat Kos<div class="alert-alamat_kos empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <textarea class="form-control" id="alamat_kos" name="alamat_kos"  s="4" placeholder="Alamat Kos Saat ini." required></textarea>
                           </div>
                           <div class="form-group">
                                <label for="desc">Jalur Masuk<div class="alert-jalur_masuk empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                                <input class="form-control" id="jalur_masuk" name="jalur_masuk" placeholder="jurusan_masuk" type="text" required/>
                           </div>
                           <div class="form-group">
                               <label for="desc">Motivasi Kuliah<div class="alert-motivasi_kuliah empty" style="display : none">Kolom ini tidak boleh kosong</div></label>
                               <textarea class="form-control" id="motivasi" name="motivasi"  s="4" placeholder="Motivasi mengapa ingin Berkuliah." required></textarea>
                           </div>
                       </div>
                       <div class="col-md-0 col-sm-1 col-xs-0"></div>
                   </div>
               </div>

               <div class="row">
                   <div class="modal-footer">
                       <div class="col-md-0 col-sm-5 col-xs-5"></div>
                       <div class="col-md-12 col-sm-2 col-xs-2">
                            <input class="btn btn-primary" id="register" name="submit" type="button" value="Simpan" />
                       </div>
                       <div class="col-md-0 col-sm-5 col-xs-5"></div>
                   </div>
               </div>

               <?php
                    form_close();
               ?>
               <br><br>
           </div>
           <div class="col-md-1"></div>
       </div>

       <div class="row" id="footer" style="margin : 0px;">
           <div class="col-md-12">

           </div>
       </div>


    <script>


        // It's Start Of Modals
        $('#register').click(function() {
            var form_data = {
                nis: $('#nis').val(),
                nama: $('#nama').val(),
                telp: $('#telp').val(),
                email: $('#email').val(),
                jurusan_smk: $('#jurusan_smk').val(),
                kelas: $('#kelas').val(),
                tahun_lulus: $('#tahun_lulus').val(),
                perguruan_tinggi: $('#perguruan_tinggi').val(),
                jenjang: $('#jenjang').val(),
                jurusan_kuliah : $('#jurusan_kuliah').val(),
                kota_domisili: $('#kota_domisili').val(),
                alamat_kos: $('#alamat_kos').val(),
                jalur_masuk: $('#jalur_masuk').val(),
                motivasi: $('#motivasi').val()

            };

            if($('#nis').val()==""){
                $('.alert-nis').fadeIn(1000);
                $('#nis').addClass('text-empty');
            } else {
                $('.alert-nis').fadeOut(1000);
                $('#nis').removeClass('text-empty');
            }
            if($('#nama').val()==""){
                $('.alert-nama').fadeIn(1000);
                $('#nama').addClass('text-empty');
            } else {
                $('.alert-nama').fadeOut(1000);
                $('#nama').removeClass('text-empty');
            }
            if($('#telp').val()==""){
                $('.alert-telp').fadeIn(1000);
                $('#telp').addClass('text-empty');
            } else {
                $('.alert-telp').fadeOut(1000);
                $('#telp').removeClass('text-empty');
            }
            if($('#email').val()==""){
                $('.alert-email').fadeIn(1000);
                $('#email').addClass('text-empty');
            } else {
                $('.alert-email').fadeOut(1000);
                $('#email').removeClass('text-empty');
            }
            if($('#jurusan_smk').val()==""){
                $('.alert-jurusan_smk').fadeIn(1000);
                $('#jurusan_smk').addClass('text-empty');
            } else {
                $('.alert-jurusan_smk').fadeOut(1000);
                $('#jurusan_smk').removeClass('text-empty');
            }
            if($('#kelas').val()==""){
                $('.alert-kelas').fadeIn(1000);
                $('#kelas').addClass('text-empty');
            } else {
                $('.alert-kelas').fadeOut(1000);
                $('#kelas').removeClass('text-empty');
            }
            if($('#tahun_lulus').val()==""){
                $('.alert-tahun_lulus').fadeIn(1000);
                $('#tahun_lulus').addClass('text-empty');
            } else {
                $('.alert-tahun_lulus').fadeOut(1000);
                $('#tahun_lulus').removeClass('text-empty');
            }
            if($('#perguruan_tinggi').val()==""){
                $('.alert-perguruan_tinggi').fadeIn(1000);
                $('#perguruan_tinggi').addClass('text-empty');
            } else {
                $('.alert-perguruan_tinggi').fadeOut(1000);
                $('#perguruan_tinggi').removeClass('text-empty');
            }
            if($('#jenjang').val()==""){
                $('.alert-jenjang').fadeIn(1000);
                $('#jenjang').addClass('text-empty');
            } else {
                $('.alert-jenjang').fadeOut(1000);
                $('#jenjang').removeClass('text-empty');
            }
            if($('#jurusan_kuliah').val()==""){
                $('.alert-jurusan_kuliah').fadeIn(1000);
                $('#jurusan_kuliah').addClass('text-empty');
            } else {
                $('.alert-jurusan_kuliah').fadeOut(1000);
                $('#jurusan_kuliah').removeClass('text-empty');
            }
            if($('#kota_domisili').val()==""){
                $('.alert-kota_domisili').fadeIn(1000);
                $('#kota_domisili').addClass('text-empty');
            } else {
                $('.alert-kota_domisili').fadeOut(1000);
                $('#kota_domisili').removeClass('text-empty');
            }
            if($('#alamat_kos').val()==""){
                $('.alert-alamat_kos').fadeIn(1000);
                $('#alamat_kos').addClass('text-empty');
            } else {
                $('.alert-alamat_kos').fadeOut(1000);
                $('#alamat_kos').removeClass('text-empty');
            }
            if($('#jalur_masuk').val()==""){
                $('.alert-jalur_masuk').fadeIn(1000);
                $('#jalur_masuk').addClass('text-empty');
            } else {
                $('.alert-jalur_masuk').fadeOut(1000);
                $('#jalur_masuk').removeClass('text-empty');
            }
            if($('#motivasi').val()==""){
                $('.alert-motivasi_kuliah').fadeIn(1000);
                $('#motivasi').addClass('text-empty');
            } else {
                $('.alert-motivasi_kuliah').fadeOut(1000);
                $('#motivasi_kuliah').removeClass('text-empty');
            }



            if($('#nis').val()==""||$('#nama').val()==""||$('#telp').val()==""||$('#email').val()==""||$('#jurusan_smk').val()==""||$('#kelas').val()==""||$('#tahun_lulus').val()==""||$('#perguruan_tinggi').val()==""||$('#jenjang').val()==""||$('#jurusan_kuliah').val()==""||$('#kota_domisili').val()==""||$('#alamat_kos').val()==""||$('#jalur_masuk').val()==""||$('#motivasi').val()==""){
                return false;
            }

            $.ajax({
                url: "StartPage/register",
                type: 'POST',
                data: form_data,
                success: function(msg) {
                    if (msg = 'YES') {
                        $('#success').fadeIn(1000);
                        $('#daftar').fadeOut(1000);
                    } else if (msg = 'NO')
                        $('#alert-msg').html('<div class="alert alert-danger text-center">Error in creating your account! Please try again later.</div>');
                    else
                        $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                },

            });
            return false;
        });
        // End Of Modals

        $('#register-again').click(function(){
            $('#success').fadeOut(1000);
            $('#daftar').fadeIn(1000);
        });


        // Start Of auto complete

        $(this).ready( function() {
            $("#perguruan_tinggi").autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url : '<?=base_url();?>index.php/StartPage/autoComplete',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'dataAlumni',
                            perguruan_tinggi : $('#perguruan_tinggi').val(),
                             _num : 1
                        },
                        success: function(data){
                            if(data.response =="true"){
                                response(data.message);
                            }
                        },
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function(event, ui) {
                    $("#perguruan_tinggi").append(
                        "<li>"+ ui.item.value + "</li>"
                    );
                },
            });
        });


    </script>

</body>

</html>