<div class="modal fade" id="edit<?php echo $urow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php
        $n=mysqli_query($conn,"select * from `users` where id='".$urow['id']."' and password='".$urow['password']."' ");
        $nrow=mysqli_fetch_array($n);
        
        // if (md5($pass) == $urow['password']) {
         
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
            <center><h3 class = "text-success modal-title">Update Member</h3></center>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form class="">
		<div class="modal-body">
            <label for="">Name:</label>
			<input type="text" value="<?php echo $nrow['name']; ?>" id="uname<?php echo $urow['id']; ?>" class="form-control">
            <label for="">Password:</label>
            <input type="text" value="<?php echo base64_decode($nrow['password']); ?>" id="upassword<?php echo $urow['id']; ?>" class="form-control">
            <label for="">Email:</label>
            <input type="text" value="<?php echo $nrow['email']; ?>" id="uemail<?php echo $urow['id']; ?>" class="form-control"><br>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>            
        </div>
		</form>
    </div>
  </div>
</div>