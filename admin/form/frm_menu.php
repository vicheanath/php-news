<div class="frm">
	<div class="head">
		<div class="title">Slide</div>
		<div class="btn-close btn hover-red"><i class="fas fa-times"></i></div>
	</div>
	<form class="upl">
		<div class="body">
			<input type="hidden" id="txt-edit-id" name="txt-edit-id" value="0">
			<lable>ID</lable>
			<input type="text" id="txt-id" name="txt-id" class="frm-control" readonly>
			<lable>Name</lable>
			<input type="text" id="txt-name" name="txt-name" class="frm-control">
			<lable>Link(Don't Update This)</lable>
			<input type="text" id="txt-link" name="txt-link" class="frm-control">
			<lable>Oder By</lable>
			<input type="text" id="txt-od" name="txt-od" class="frm-control">
			<lable>Color</lable>
			<input type="text" id="txt-color" name="txt-color" class="frm-control">
			
			<lable>Status</lable>
			<select id="txt-status" name="txt-status" class="frm-control">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<lable>Photo</lable>
			<div class="img-group">
				<div class="img-box">
					<input type="file" id="txt-file" name="txt-file" class="txt-file">
					<input type="text" name="txt-photo" id="txt-photo" class="txt-photo">
				</div>
			</div>
		</div>
	
		<div class="footer">
			<a class="btn btn-post hover-green">+ Save</a>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$("#colorpicker").spectrum({
			color: "#f00"
		});
	});
	
</script>
