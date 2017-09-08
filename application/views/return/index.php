<script type="text/javascript">
$(document).ready(function(){
	$(function() {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
	      null, null, null, null, null, null, null,
		  { "bSortable": false }
		] } );

	});
});
</script>

<div class="space-6"></div>
<p>
	<a href="#tambah" class="btn btn-primary btn-small" role="button" data-toggle="modal">Tambah</a>
	<a href="<?=site_url();?>/retur/excel" class="btn btn-success btn-small">Export to Excel</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Customer</th>
		<th>Type GPS</th>
		<th>Tanggal Datang</th>
		<th>Tanggal Kembali</th>
		<th>IMEI</th>
		<th>Tanggal Pembelian</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<?php
		$no = 1;
		foreach($data->result() as $row):
		$gps = $this->model_retur->tampilgps($row->id_gps);
		?>
		<td><?=$no++;?></td>
		<td><?=strtoupper($row->nama);?></td>
		<td><?=strtoupper($gps);?></td>
		<td><?=$row->tgl_datang;?></td>
		<td><?=$row->tgl_kembali;?></td>
		<td><?=$row->imei;?></td>
		<td><?=$row->tgl_pembelian;?></td>
		<td>
			<a href="<?=site_url();?>/retur/edit/<?=$row->id_retur;?>" class="btn btn-mini btn-info" role="button" data-toggle="modal"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url();?>/retur/hapus/<?=$row->id_retur;?>" class="btn btn-mini btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
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

	<form class="form-horizontal" method="POST" action="<?=site_url();?>/retur/simpan">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama Customer</label>
						<div class="controls">
							<input type="hidden" name="id_retur">
							<input type="text" name="nama" placeholder="Nama Customer" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Type GPS</label>
						<div class="controls">
							<select name="gps" required>
								<option value="0">---PILIH---</option>
								<?php foreach($data1->result() as $query):?>
								<option value="<?=$query->id_gps;?>"><?=strtoupper($query->nama_gps);?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tanggal Datang</label>
						<div class="controls">
							<input type="text" class="input-small input-mask-date" name="tgl_datang" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tanggal Kembali</label>
						<div class="controls">
							<input type="text" class="input-small input-mask-date" name="tgl_kembali">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">IMEI</label>
						<div class="controls">
							<input type="text" name="imei" placeholder="IMEI" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tanggal Pembelian</label>
						<div class="controls">
							<input type="text" class="input-small input-mask-date" name="tgl_pembelian">
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