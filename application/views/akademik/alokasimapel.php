<section class="content-header">
  <h1>
    Alokasi Mapel  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('mapel') ?>">Mapel</a></li>
    <li class="active">Alokasi Mapel</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">
            	<div class="box-header">
              		<h3 class="box-title">Alokasi Kelas <i class="fa fa-arrow-right"></i> Mata Pelajaran</h3>
              		<div class="pull-right">
              			<?php foreach ($get1 as $data1){ ?>
                        <font style="font-size: 16px; font-weight: bold;"><?php echo $data1->nama_mapel ?></h3></font>
                        <?php } ?>
              		</div>
            	</div>            
            	<div class="box-body">
            		<div class="row">
            			<div class="col-md-6">
                            <div class="col-md-10">
            				    <legend>Data Kelas</legend>
                            </div>
                            <?php echo form_open('mapel/alokasisimpan/'.$this->uri->segment(3)); ?>
                            <div class="pull-right"><button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-arrow-right"></span> Simpan</button></div>
            				<table class="table table-bordered table-hover" id="example5">
            					<thead>
            						<tr class="info">
                                        <th width="1%"><input type="checkbox" id="call"></th>					
                                        <th>Nama Kelas</th>                                                                     
            							<th>Keterangan</th>            							            					
            						</tr>
            					</thead>
            					<tbody>
            						<?php foreach ($get as $data) { ?>
            						<tr>
            							<td><input type="checkbox" class="cb" name="cb[<?php echo $data->id_kelas ?>]"></td>
                                        <td><?php echo $data->nama_kelas ?></td>                                       
            							<td><?php echo $data->keterangan ?></td>            							
            						</tr>            					
                                    <?php } ?>	
            					</tbody>
                                <?php echo form_close(); ?>
            				</table>
            			</div>
            			<div class="col-md-6">
            				 <div class="col-md-10">
                                <legend>Data Alokasi ke Kelas</legend>
                            </div>
                            <?php echo form_open('mapel/alokasihapus/'.$this->uri->segment(3)); ?>
                            <div class="pull-right"><button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Hapus</button></div>
            				<table class="table table-bordered table-hover" id="example6">
            					<thead>
            						<tr class="info">            				
                                        <th width="1%"><input type="checkbox" id="call2"></th>		
            							<th>Nama Kelas</th>            							
            							<th>Keterangan</th>
            						</tr>
            					</thead>
            					<tbody> 
                                    <?php foreach ($get2 as $data2) { ?>       							
            						<tr>
                                        <td><input type="checkbox" class="cb2" name="cb[<?php echo $data2->id ?>]"></td>
                                        <td><?php echo $data2->nama_kelas ?></td>
            							<td><?php echo $data2->keterangan ?></td>
            						</tr>
            						<?php } ?>
            					</tbody>
            				</table>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</section>