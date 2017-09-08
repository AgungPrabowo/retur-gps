<script type="text/javascript">
	function cekform()
	{
		if(!$("#nama").val())
		{
			bootbox.alert('Nama GPS tidak boleh kosong');
			return false;
		}

	}
</script>

<form class="form-horizontal" method="POST" action="<?=site_url();?>/gps/simpan" onsubmit="return cekform();">
	<div class="control-group">
		<label class="control-label">Nama GPS</label>
		<div class="controls">
			<input type="hidden" value="update" name="key">
			<input type="hidden" value="<?=$id;?>" name="id">
			<input type="input" name="nama" id="nama" placeholder="Nama GPS" value="<?=$nama;?>" >
		</div>
	</div>

	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<a href="<?=site_url();?>/gps/" class="btn btn-danger btn-small">Batal</a>
</form>