<script type="text/javascript">
	function cekform()
	{
		if(!$("#nama").val())
		{
			bootbox.alert('Nama Customer tidak boleh kosong');
			$("#nama").focus();
			return false;
		}

		if(!$("#tgl_datang").val())
		{
			bootbox.alert('Tanggal Datang tidak boleh kosong');
			$("#tgl_datang").focus();
			return false;
		}

		if(!$("#imei").val())
		{
			bootbox.alert('IMEI tidak boleh kosong');
			$("#imei").focus();
			return false;
		}

		if(!$("#ket").val())
		{
			bootbox.alert('Keterangan jurusan tidak boleh kosong');
			$("#ket").focus();
			return false;
		}
	}
</script>

<form class="form-horizontal" method="POST" action="<?=site_url();?>/retur/simpan" onsubmit="return cekform();">
	<div class="control-group">
		<label class="control-label">Nama Customer</label>
		<div class="controls">
			<input type="input" name="nama" id="nama" placeholder="Nama Customer" value="<?=$nama;?>" required>
			<input type="hidden" id="gps1" value="<?=$gps;?>">
			<input type="hidden" name="id_retur" id="id_retur" value="<?=$key;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Type GPS</label>
		<div class="controls">
			<select name="gps" id="gps">
				<?php foreach($data->result() as $row):?>
				<option value="<?=$row->id_gps;?>"><?=$row->nama_gps;?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Tanggal Datang</label>
		<div class="controls">
			<input type="input" name="tgl_datang" id="tgl_datang" class="input-small input-mask-date" value="<?=$tgl_datang;?>" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Tanggal Kembali</label>
		<div class="controls">
			<input type="input" name="tgl_kembali" id="tgl_kembali" class="input-small input-mask-date" value="<?=$tgl_kembali;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">IMEI</label>
		<div class="controls">
			<input type="input" name="imei" id="imei" placeholder="IMEI" value="<?=$imei;?>" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Tanggal Pembelian</label>
		<div class="controls">
			<input type="input" name="tgl_pembelian" id="tgl_pembelian" class="input-small input-mask-date" value="<?=$tgl_pembelian;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Keterangan</label>
		<div class="controls">
			<textarea type="input" name="ket" id="ket" required><?=$ket;?>
			</textarea>
		</div>
	</div>
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<a href="<?=site_url();?>/retur" class="btn btn-danger btn-small">Batal</a>
	</div>
</form>

<script type="text/javascript">
$(function(){
	$('.input-mask-date').mask('99/99/9999');
	var key = $("#gps1").val();
	$("#gps").val(key).prop({selected});
});
</script>
