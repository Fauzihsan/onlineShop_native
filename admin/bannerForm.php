<div class="mainAdmin">

<form action="" method="POST" enctype="multipart/form-data">
	<div class="insertBanner">
	<div class="form-group">
		<label>Banner</label>	
		<input type="text" name="banner" class="form-control" required>
	</div>	
	<div class="form-group">
		<label>Gambar</label><br>	
		<input type="file" name="file">
	</div>	  

	<div class="form-group">
		<label>Status</label>	<br>
			<input type="radio" value="on" name="status" required/> On
			<input type="radio" value="off" name="status" required/> Off		
	</div>	   
	   
		<button type="submit" name="insertBanner" class="btn btn-primary">SUBMIT</button>
	</div>
</form>
</div>
