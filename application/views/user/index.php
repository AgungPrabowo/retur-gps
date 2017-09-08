<script type="text/javascript">
$(document).ready(function(){
	$(function() {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
	      null, null,
		  { "bSortable": false }
		] } );

	});
});
</script>

<div class="space-6"></div>
<p>
	<a href="#tambah" class="btn btn-primary btn-small" role="button" data-toggle="modal">Tambah</a>
	<?php 
	$info = $this->session->flashdata('info');
	if($info):?>
		<div class="alert alert-block alert-error">
			<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
			</button>
			<i class="icon-remove"></i>
	<?php
	echo $info;
	?>
	</div>
	<?php endif;?>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>user</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<?php
		$no = 1;
		foreach($data->result() as $row):	
		?>
		<td><?=$no++;?></td>
		<td><?=$row->user;?></td>
		<td>
			<a href="<?=site_url();?>/user/edit/<?=$row->id_user;?>" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url();?>/user/hapus/<?=$row->id_user;?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');" class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php endforeach;?>
</tbody>
</table>

<!--Modal Tambah-->
<div id="tambah" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Tambah Data User</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url();?>/user/simpan">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">User</label>
						<div class="controls">
							<input type="text" name="user" placeholder="User" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" name="pass" placeholder="Password" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Ulangi Password</label>
						<div class="controls">
							<input type="password" name="re-pass" placeholder="Password" required>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-small" data-dismiss="modal">
				<i class="icon-remove"></i>
				Batal
			</button>

			<button type="submit" class="btn btn-small btn-primary">
				<i class="icon-ok"></i>
				Simpan
			</button>
		</div>

	</form>
</div>