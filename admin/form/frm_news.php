<?php
include "../action/db/db.php";
$db = new Database;
?>
<div class="frm frm-news">
	<div class="head">
		<div class="title">Slide</div>
		<div class="btn-close btn hover-red"><i class="fas fa-times"></i></div>
	</div>
	<form class="upl">
		<div class="body">
			<div id="info-news">
				<input type="text" id="txt-date" value="<?php echo date("Y-m-d h:i:sa"); ?>">
				<input type="text" id="txt-edit-id" name="txt-edit-id" value="0">
				<lable>ID</lable>
				<input type="text" id="txt-id" name="txt-id" class="frm-control" readonly>
				<lable>Title</lable>
				<input type="text" id="txt-title" name="txt-title" class="frm-control">
				<lable>Category</lable>
				<select id="txt-menu" name="txt-menu" class="frm-control">
					<option value="0">---select category---</option>
					<?php
					$post_data = $db->select_data("tbl_menu", "id,name", "status=1", "od DESC", "0,99999");
					if ($post_data != 0) {
						foreach ($post_data as $row) {
					?>
							<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
					<?php
						}
					}
					?>
				</select>
				<lable>Oder By</lable>
				<input type="text" id="txt-od" name="txt-od" class="frm-control">
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
			<style>
				.modal-backdrop {
					z-index: 0;
				}
			</style>
			<div id="des-box">
				<lable>News Detail</lable>
				<textarea id="txt-des" name="txt-des" class="txt-des" style="margin-top: 50px"></textarea>
			</div>
		</div>
		<div class="footer">
			<a class="btn btn-post hover-green">+ Save</a>
		</div>
	</form>
</div>