<section class="content-header">
  <h1>
    Pencarian Data Tagihan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('inputbayar') ?>">Input Pembayaran</a></li>
    <li class="active">Data Tagihan</li>    
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header"></div>             -->
                <div class="box-body">                	
                    <?php echo form_open('inputbayar/direct', array('class' => 'form-horizontal', 'id' => 'form')); ?>	           
                        <div class="form-group">
                            <label class="control-label col-md-2">Kelas</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="kelas" class="form-control" id="kelas" required="">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($kelas as $data) { ?>
                                    <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Rombel</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="rombel" class="form-control" id="rombel2" required="">
                                    <option value="">-- Pilih --</option>              
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Siswa</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="siswa" class="form-control" id="siswa" required="">
                                    <option value="">-- Pilih --</option>                                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>