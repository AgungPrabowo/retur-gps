<script type="text/javascript">
$(document).ready(function(){
	$(function() {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
	      null, null, null, null, null,
		  { "bSortable": false }
		] } );

	});
});
</script>

<div class="space-6"></div>
<p>
	<a href="#tambah" class="btn btn-primary btn-small" role="button" data-toggle="modal">Tambah</a>
	<a href="<?=site_url();?>/cina/excel" class="btn btn-success btn-small">Export to Excel</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>IMEI</th>
		<th>Type GPS</th>
		<th>Damage</th>
		<th>Keterangan</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<?php
		$no = 1;
		foreach($data1->result() as $row):
		$gps = $this->model_cina->tampilgps($row->id_gps);
		?>
		<td><?=$no++;?></td>
		<td><?=$row->imei;?></td>
		<td><?=strtoupper($gps);?></td>
		<td><?=$row->damage;?></td>
		<td><?=$row->ket;?></td>
		<td>
			<a href="<?=site_url();?>/cina/edit/<?=$row->id_cina;?>" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url();?>/cina/hapus/<?=$row->id_cina;?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');" class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php endforeach;?>
</tbody>
</table>

<!--Modal Tambah-->
<div id="tambah" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Tambah Data Return GPS ke Cina</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url();?>/cina/simpan">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">IMEI</label>
						<div class="controls">
							<input type="hidden" name="key" value="tambah">
							<input type="text" name="imei" placeholder="IMEI" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Nama GPS</label>
						<div class="controls">
							<select name="nama" required>
								<option value="">--PILIH---</option>
								<?php foreach($data->result() as $row):?>
								<option value="<?=$row->id_gps;?>"><?=strtoupper($row->nama_gps);?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Damage</label>
						<div class="controls">
							<input type="text" name="damage" placeholder="Damage" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Keterangan</label>
						<div class="controls">
							<textarea type="text" name="ket" required>
							</textarea>
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