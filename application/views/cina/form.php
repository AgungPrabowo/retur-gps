<script type="text/javascript">

	$(function(){
		var key = $("#gps1").val();
		$("#gps").val(key).prop({selected});
	});

	function cekform()
	{
		if(!$("#imei").val())
		{
			bootbox.alert('IMEI tidak boleh kosong');
			return false;
		}
		if(!$("#gps").val())
		{
			bootbox.alert('Type GPS tidak boleh kosong');
			return false;
		}
		if(!$("#damage").val())
		{
			bootbox.alert('Damage tidak boleh kosong');
			return false;
		}
		if(!$("#ket").val())
		{
			bootbox.alert('Keterangan tidak boleh kosong');
			return false;
		}


	}
</script>

<form class="form-horizontal" method="POST" action="<?=site_url();?>/cina/simpan" onsubmit="return cekform();">

	<div class="control-group">
		<label class="control-label">IMEI</label>
		<div class="controls">
			<input type="hidden" value="update" name="key">
			<input type="hidden" value="<?=$id;?>" name="id">
			<input type="hidden" id="gps1" value="<?=$gps;?>">
			<input type="input" name="imei" id="imei" placeholder="IMEI" value="<?=$imei;?>" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Type GPS</label>
		<div class="controls">
			<select name="gps" id="gps" required>
				<?php foreach($data->result() as $row):?>
				<option value="<?=$row->id_gps;?>"><?=strtoupper($row->nama_gps);?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Damage</label>
		<div class="controls">
			<input type="input" name="damage" id="damage" placeholder="DAMAGE" value="<?=$damage;?>" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Keterangan</label>
		<div class="controls">
			<textarea id="ket" name="ket" required><?=$ket;?></textarea>
		</div>
	</div>

	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<a href="<?=site_url();?>/cina/" class="btn btn-danger btn-small">Batal</a>
	</div>
</form>