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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="<?=base_url();?>bootstrap/image/imaskaduta_header.png" class="header-image">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Apa itu IMASKADUTA ?</a></li>
                <li><a href="#daftar">Daftar sebagai anggota</a></li>
                <li><a href="<?=base_url();?>index.php/dataAlumni"> anggota IMASKADUTA</a></li>
                <li><a href="<?=base_url();?>index.php/Administrator/Login/Logout">LOGOUT</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="row" id="daftar">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="<?=base_url();?>bootstrap/image/imaskaduta_besar_panjang.png" class="start-image">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 start-text-3">
                DATA ANGGOTA IMASKADUTA
            </div>
        </div>
        <br>

        <div class="container">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Lulus</th>
                    <th>Perguruan Tinggi</th>
                    <th>Jurusan</th>
                    <th>Jalur Masuk</th>
                    <th>Action</th>
                </tr>
                </thead>
                
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Lulus</th>
                    <th>Perguruan Tinggi</th>
                    <th>Jurusan</th>
                    <th>Jalur Masuk</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <script src="<?php echo base_url('bootstrap/js/jquery.js')?>"></script>
        <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/dataTables/media/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('assets/dataTables/media/js/dataTables.bootstrap.js')?>"></script>


        <script type="text/javascript">

            var save_method; //for save method string
            var table;

            $(document).ready(function() {

                //datatables
                table = $('#table').DataTable({

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('Administrator/DataAlumni/ajax_list')?>",
                        "type": "POST"
                    },

                    //Set column definition initialisation properties.
                    "columnDefs": [
                        {
                            "targets": [ -1 ], //last column
                            "orderable": false, //set not orderable
                        },
                    ],
                });
            });



            function add_person()
            {
                save_method = 'add';
                //$('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#modal_form').modal('show'); // show bootstrap modal
                $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
            }

            function edit_person(id)
            {
                save_method = 'update';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string

                //Ajax Load data from ajax
                $.ajax({
                    url : "<?php echo site_url('Administrator/DataAlumni/ajax_edit')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('[name="id"]').val(data.id);
                        $('[name="nis"]').val(data.NIS);
                        $('[name="nama"]').val(data.nama);
                        $('[name="telp"]').val(data.telp);
                        $('[name="email"]').val(data.email);
                        $('[name="jurusan_smk"]').val(data.jurusan_smk);
                        $('[name="kelas"]').val(data.kelas);
                        $('[name="tahun_lulus"]').val(data.tahun_lulus);
                        $('[name="perguruan_tinggi"]').val(data.perguruan_tinggi);
                        $('[name="jenjang"]').val(data.jenjang);
                        $('[name="jurusan_kuliah"]').val(data.jurusan_kuliah);
                        $('[name="kota_domisili"]').val(data.kota_domisili);
                        $('[name="alamat_kos"]').val(data.alamat_kos);
                        $('[name="jalur_masuk"]').val(data.jalur_masuk);
                        $('[name="motivasi"]').val(data.motivasi);
                        //$('[name="dob"]').datepicker('update',data.dob);
                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Edit Data Anggota IMASKADUTA'); // Set title to Bootstrap modal title

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }

            function detail_person(id)
            {
                save_method = 'update';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string

                //Ajax Load data from ajax
                $.ajax({
                    url : "<?php echo site_url('Administrator/DataAlumni/ajax_edit')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('[name="id"]').val(data.id);
                        $('[name="nis"]').val(data.NIS);
                        $('[name="nama"]').val(data.nama);
                        $('[name="telp"]').val(data.telp);
                        $('[name="email"]').val(data.email);
                        $('[name="jurusan_smk"]').val(data.jurusan_smk);
                        $('[name="kelas"]').val(data.kelas);
                        $('[name="tahun_lulus"]').val(data.tahun_lulus);
                        $('[name="perguruan_tinggi"]').val(data.perguruan_tinggi);
                        $('[name="jenjang"]').val(data.jenjang);
                        $('[name="jurusan_kuliah"]').val(data.jurusan_kuliah);
                        $('[name="kota_domisili"]').val(data.kota_domisili);
                        $('[name="alamat_kos"]').val(data.alamat_kos);
                        $('[name="jalur_masuk"]').val(data.jalur_masuk);
                        $('[name="motivasi"]').val(data.motivasi);
                        //$('[name="dob"]').datepicker('update',data.dob);
                        $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Anggota IMASKADUTA'); // Set title to Bootstrap modal title

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }

            function reload_table()
            {
                table.ajax.reload(null,false); //reload datatable ajax
            }

            function save()
            {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable

                // ajax adding data to database
                $.ajax({
                    url :  "<?php echo site_url('Administrator/DataAlumni/ajax_update')?>",
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {

                        if(data.status) //if success close modal and reload ajax table
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        }

                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable

                    }
                });
            }

            function delete_person(id)
            {
                if(confirm('Are you sure delete this data?'))
                {
                    // ajax delete data to database
                    $.ajax({
                        url : "<?php echo site_url('Administrator/DataAlumni/ajax_delete')?>/"+id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table
                            $('#modal_form').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });

                }
            }

        </script>
        <br><br>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row" id="footer">
    <div class="col-md-12">

    </div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" id="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" name="id" type="hidden"/>
                                    <div class="form-group">
                                        <label for="desc">NIS</label>
                                        <input class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa sewaktu SMK" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Nama</label>
                                        <input class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">No. Telp / HP</label>
                                        <input class="form-control" id="telp" name="telp" placeholder="No. Telepon / HP Aktif" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Email</label>
                                        <input class="form-control" id="email" name="email" placeholder="alamat Email Aktif" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="desc">Jurusan</label>
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
                                                <label for="desc">Kelas</label>
                                                <input class="form-control" id="kelas" name="kelas" placeholder="kelas di SMK (A/B/..)" type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Tahun Lulus</label>
                                        <input class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="tahun lulus" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Pendidikan Tinggi Saat Ini</label>
                                        <input class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Perguruan Tinggi yang ditempuh" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jenjang Pendidikan</label>
                                        <select name="jenjang" id="jenjang" class="form-control">
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="S1/D4">S1/D4</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jurusan / Program Studi yang Ditempuh</label>
                                        <input class="form-control" id="jurusan_kuliah" name="jurusan_kuliah" placeholder="Jurusan / Program Studi yang Ditempuh" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Kota Domisili</label>
                                        <input class="form-control" id="kota_domisili" name="kota_domisili" placeholder="Wilayah / Domisili saat Kuliah" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Alamat Kos</label>
                                        <textarea class="form-control" id="alamat_kos" name="alamat_kos" rows="4" placeholder="Alamat Kos Saat ini."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jalur Masuk</label>
                                        <input class="form-control" id="jalur_masuk" name="jalur_masuk" placeholder="jurusan_masuk" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Motivasi Kuliah</label>
                                        <textarea class="form-control" id="motivasi" name="motivasi" rows="4" placeholder="Motivasi mengapa ingin Berkuliah."></textarea>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" id="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" name="id" type="hidden"/>
                                    <div class="form-group">
                                        <label for="desc">NIS</label>
                                        <input class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa sewaktu SMK" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Nama</label>
                                        <input class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">No. Telp / HP</label>
                                        <input class="form-control" id="telp" name="telp" placeholder="No. Telepon / HP Aktif" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Email</label>
                                        <input class="form-control" id="email" name="email" placeholder="alamat Email Aktif" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="desc">Jurusan</label>
                                                <select name="jurusan_smk" id="jurusan_smk" class="form-control" required disabled="disabled">
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
                                                <label for="desc">Kelas</label>
                                                <input class="form-control" id="kelas" name="kelas" placeholder="kelas di SMK (A/B/..)" type="text" disabled="disabled"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Tahun Lulus</label>
                                        <input class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="tahun lulus" type="text" disabled="disabled"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Pendidikan Tinggi Saat Ini</label>
                                        <input class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Perguruan Tinggi yang ditempuh" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jenjang Pendidikan</label>
                                        <select name="jenjang" id="jenjang" class="form-control" disabled="disabled">
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="S1/D4">S1/D4</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jurusan / Program Studi yang Ditempuh</label>
                                        <input class="form-control" id="jurusan_kuliah" name="jurusan_kuliah" placeholder="Jurusan / Program Studi yang Ditempuh" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Kota Domisili</label>
                                        <input class="form-control" id="kota_domisili" name="kota_domisili" placeholder="Wilayah / Domisili saat Kuliah" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Alamat Kos</label>
                                        <textarea class="form-control" id="alamat_kos" name="alamat_kos" rows="4" placeholder="Alamat Kos Saat ini." disabled="disabled"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Jalur Masuk</label>
                                        <input class="form-control" id="jalur_masuk" name="jalur_masuk" placeholder="jurusan_masuk" type="text" disabled="disabled"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Motivasi Kuliah</label>
                                        <textarea class="form-control" id="motivasi" name="motivasi" rows="4" placeholder="Motivasi mengapa ingin Berkuliah." disabled="disabled"></textarea>
                                    </div>
                                </div>
                            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


</body>

</html>