<div class="frm frm-news">
	<div class="head">
		<div class="title">Slide</div>
		<div class="btn-close btn hover-red"><i class="fas fa-times"></i></div>
	</div>
	<form class="upl">
		<div class="body">
			<div id="info-news">
			<input type="hidden" id="txt-edit-id" name="txt-edit-id" value="0">
			<lable>ID</lable>
			<input type="text" id="txt-id" name="txt-id" class="frm-control" readonly>
			<lable>Name</lable>
			<input type="text" id="txt-name" name="txt-name" class="frm-control">
			<lable>Location</lable>
			<select id="txt-location" name="txt-location" class="frm-control">
				<option value="0">---select location---</option>
				<option value="1">Ads-Top</option>
				<option value="2">Ads-Right-1</option>
				<option value="3">Ads-Right-2</option>
			</select>
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
			<div id="des-box">
				<lable>News Detail</lable>
				 <textarea id="txt-des-ads" name="txt-des-ads" class="txt-des-ads" style="margin-top: 50px"></textarea>
			</div>
		</div>
	
		<div class="footer">
			<a class="btn btn-post hover-green">+ Save</a>
		</div>
	</form>
</div>
