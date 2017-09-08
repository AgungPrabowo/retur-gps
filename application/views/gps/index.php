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
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Nama GPS</th>
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
		<td><?=strtoupper($row->nama_gps);?></td>
		<td>
			<a href="<?=site_url();?>/gps/edit/<?=$row->id_gps;?>" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url();?>/gps/hapus/<?=$row->id_gps;?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');" class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php endforeach;?>
</tbody>
</table>

<!--Modal Tambah-->
<div id="tambah" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Tambah Data Return GPS</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url();?>/gps/simpan">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama GPS</label>
						<div class="controls">
							<input type="hidden" name="id">
							<input type="text" name="nama" placeholder="Nama Customer" required>
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
<!--End Modal Tambah-->

<script type="text/javascript">
$(function(){
	$('.input-mask-date').mask('99/99/9999');

});
</script>