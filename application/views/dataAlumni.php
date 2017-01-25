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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url();?>index.php/startPage" class="smoothScroll">Apa itu IMASKADUTA ?</a></li>
                    <li><a href="<?=base_url();?>index.php/startPage#daftar" class="smoothScroll">Daftar sebagai anggota</a></li>
                    <li><a href="<?=base_url();?>index.php/dataAlumni"> anggota IMASKADUTA</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<div class="row" id="daftar" style="margin : 0px;">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="<?=base_url();?>bootstrap/image/imaskaduta_besar_panjang.png" class="start-image-top">
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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Lulus</th>
                    <th>Perguruan Tinggi</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Jalur Masuk</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Lulus</th>
                    <th>Perguruan Tinggi</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Jalur Masuk</th>
                </tr>
                </tfoot>
            </table>
        </div>

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
                        "url": "<?php echo site_url('dataAlumni/ajax_list')?>",
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
                $('#form')[0].reset(); // reset form on modals
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
                    url : "<?php echo site_url('dataAlumni/ajax_edit/')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {

                        $('[name="id"]').val(data.id);
                        $('[name="firstName"]').val(data.firstName);
                        $('[name="lastName"]').val(data.lastName);
                        $('[name="gender"]').val(data.gender);
                        $('[name="address"]').val(data.address);
                        $('[name="dob"]').datepicker('update',data.dob);
                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

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
                var url;

                if(save_method == 'add') {
                    url = "<?php echo site_url('dataAlumni/ajax_add')?>";
                } else {
                    url = "<?php echo site_url('dataAlumni/ajax_update')?>";
                }

                // ajax adding data to database
                $.ajax({
                    url : url,
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
                        url : "<?php echo site_url('dataAlumni/ajax_delete')?>/"+id,
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

<div class="row" id="footer" style="margin : 0px;">
    <div class="col-md-12">

    </div>
</div>


</body>

</html>