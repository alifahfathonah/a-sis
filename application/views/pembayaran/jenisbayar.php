<section class="content-header">
  <h1>
    Jenis Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Jenis Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Jenis Pembayaran</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <button type="button" class="btn btn-success btn-sm" onclick="add_jenis()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>Kode Jenis</th>
                      <th>Nama Jenis</th>
                      <th>Tipe Jenis</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =1 ;
                    foreach ($get as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->kode_jenis; ?></td>
                      <td><?php echo $data->nama_jenis; ?></td>
                      <td>
                      	<?php if ($data->tipe_jenis == "1") {
                      		echo "Angsuran";
                      	}else{ echo "Tiap Bulan"; } ?>                      	
                      </td>
                      <td><?php echo $data->ket; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit_jm('<?php echo $data->id ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo base_url('jenisbayar/hapus/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Form Input Jenis Pembayaran</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      	<label class="control-label col-md-3">Kode Jenis</label>
                    	<div class="col-md-9">
                        	<input name="kode_jenis" placeholder="Kode Jenis" class="form-control" type="text" maxlength="3">
                      	</div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Jenis</label>
                    <div class="col-md-9">
                        <input name="nama_jenis" placeholder="Nama Jenis Pembayaran" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      	<label class="control-label col-md-3">Tipe Jenis</label>
                    	<div class="col-md-9">
                        <select name="tipe_jenis" class="form-control" style="width: 100%;">
                          <option value="">Pilih</option>
                          <option value="1">Angsuran</option>
                          <option value="2">Tiap Bulan</option>                          
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Keterangan</label>
                  	  <div class="col-md-9">
                        <input name="ket" placeholder="Keterangan" class="form-control" type="text">
                      </div>
                  </div>
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
<script>
    var save_method; //for save method string
    var table;
    var gid;
    function add_jenis()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_jm(idj)
    {
      save_method = 'update';
      gid = idj;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/jenisbayar/get')?>/" + idj,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="kode_jenis"]').val(data.kode_jenis);
            $('[name="nama_jenis"]').val(data.nama_jenis);
            $('[name="tipe_jenis"]').val(data.tipe_jenis);
            $('[name="ket"]').val(data.ket);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Jenis Pembayaran'); // Set title to Bootstrap modal title
            $('[name="tipe_jenis"]').trigger('change');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/jenisbayar/simpan')?>";
      }else{
          url = "<?php echo site_url('index.php/jenisbayar/edit/')?>" + gid;
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
</script>
