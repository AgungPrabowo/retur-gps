<script type="text/javascript">
function cekform(){
	if(!$("#user").val())
	{
		bootbox.alert('Username Tidak boleh kosong');
		return false;
	}

	if(!$("#old-password").val())
	{
		bootbox.alert('Password Lama Tidak boleh Kosong');
		return false;
	}

	if(!$("#new-password").val())
	{
		bootbox.alert('Password Baru Tidak boleh kosong');
		return false;
	}

	if(!$("#re-new-password").val())
	{
		bootbox.alert('Ulangi Password Baru Tidak boleh kosong');
		return false;
	}

	var pass1	= $("#new-password").val();
	var pass2	= $("#re-new-password").val();

	if(pass1 !== pass2)
	{
		bootbox.alert('Password Baru Tidak Sama');
		return false;
	}

}

</script>
<p>
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
<form class="form-horizontal" method="POST" action="<?=site_url();?>/user/simpan" onsubmit="return cekform();">

	<div class="control-group">
		<label class="control-label">User</label>
		<div class="controls">
			<input type="hidden" name="id" value="<?=$id;?>">
			<input type="hidden" name="key" value="update">
			<input type="text" name="user" id="user"  class="span5" value="<?=$user;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Password Lama</label>
		<div class="controls">
			<input type="password" name="pass" id="old-password" placeholder="Password Lama" class="span5" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Password Baru</label>
		<div class="controls">
			<input type="password" name="new-pass" id="new-password" placeholder="Password Baru" class="span5" required>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Ulangi Password Baru</label>
		<div class="controls">
			<input type="password" name="re-pass" id="re-new-password" placeholder="Ulangi Password Baru" class="span5" required>
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>
	<a href="<?=site_url();?>/user/" class="btn btn-danger btn-small">Batal</a>
</form>