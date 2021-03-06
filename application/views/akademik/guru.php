<section class="content-header">
  <h1>
    Guru  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Guru</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Guru</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <button type="button" class="btn btn-success btn-sm" onclick="add_guru()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jekel</th>
                      <th>NO HP</th>
                      <th>Alamat</th>
                      <th width="18%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no =1 ;
                    foreach ($get as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>                      
                      <td><?php echo $data->nip; ?></td>
                      <td><?php echo $data->nama_guru; ?></td>
                      <td><?php echo $data->jekel; ?></td>
                      <td><?php echo $data->no_hp; ?></td>
                      <td><?php echo $data->alamat; ?></td>
                      <td>
                        <a href="<?php echo base_url('guru/alokasi/'.$data->kode_guru) ?>" class="btn btn-success btn-sm"><i class="fa  fa-code-fork"></i> Alokasi</a>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit_jm('<?php echo $data->kode_guru ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo base_url('guru/hapus/'.$data->kode_guru) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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
            <h3 class="modal-title">Form Input Guru</h3000>
          </div>
          <div class="modal-body form">
            <form action="#" name="form" id="form" class="form-horizontal">
                <div class="form-body">                  
                  <div class="form-group">
                    <label class="control-label col-md-3">NIP</label>
                    <div class="col-md-9">
                        <input name="nip" data-validation="required" placeholder="NIP" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Guru</label>
                    <div class="col-md-9">
                        <input name="nama_guru" placeholder="Nama Guru" class="form-control" type="text" required="">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Jekel</label>
                    <div class="col-md-9">
                        <input type="radio" name="jekel" value="L"> Laki-Laki
                        <input type="radio" name="jekel" value="P"> Perempuan
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">No HP</label>
                    <div class="col-md-9">
                        <input name="no_hp" placeholder="Nomor HP" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Alamat</label>
                      <div class="col-md-9">
                      <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-md-3"></label>                    
                    <div class="col-md-9">
                      <p class="form-control-static">NIP dijadikan sebagai password default untuk guru.</p>
                    </div>
                  </div>           
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
    var save_method; //for save method string
    var table;
    var gid;
    function add_guru()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_jm(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/guru/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var j = data.jekel;         
            $('[name="nip"]').val(data.nip);
            $('[name="nama_guru"]').val(data.nama_guru);                        
            //$('[name="jekel"]['+(data.jekel)+']').prop('checked', true);
            $(':input[value="'+ j +'"]').prop("checked",true);
            $('[name="no_hp"]').val(data.no_hp);
            $('[name="alamat"]').val(data.alamat);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Jenis Mapel'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;      
      var x = document.forms["form"]["nip"].value;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/guru/simpan')?>";          
      }else{          
          url = "<?php echo site_url('index.php/guru/edit/')?>" + gid;         
      }
    if (x == "") {
        alert("NIP Harus Diisi");
        return false;
    }else{
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
    }

   

    </script>