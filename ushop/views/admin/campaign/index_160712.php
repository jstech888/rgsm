<!DOCTYPE html>
<html lang="zh-Hant">
	<head>
	<!-- 最新編譯和最佳化的 CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- 選擇性佈景主題 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<!-- 最新編譯和最佳化的 JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
		<h3>查詢條件</h3>
		<form action="" method="get" role="form" >
		<input type="hidden" name="_r" value="<?php echo rand()?>">
		<input type="hidden" name="step" value="">
		<div class="form-group">
			<label>序號</label>
			<input class="form-control" type="text" name="sn" value="<?php echo $this->input->get('sn')?>">
		</div>
		<div class="form-group">
		<label>客戶姓名</label>
		<input class="form-control" type="text" name="username" value="<?php echo $this->input->get('username')?>">
		</div>
		<div class="form-group">
		<label>客戶電話</label>
		<input class="form-control" type="text" name="phone" value="<?php echo $this->input->get('phone')?>">
		</div>
		<div class="form-group">
		<label for="sel1">是否已兌獎</label>
		<select class="form-control" name="played_flag" id="sel1">
		  <option <?php if($this->input->get('played_flag') == '' ):?>selected<?php endif;?> value="">全部</option>
		  <option <?php if($this->input->get('played_flag') == '1' ):?>selected<?php endif;?> value="1">是</option>
		  <option <?php if($this->input->get('played_flag') == '0' ):?>selected<?php endif;?> value="0">否</option>
		</select>
		</div>
		<div class="form-group">
		<label for="sel1">獎項</label>
		<select class="form-control" name="gift_id" id="gift_id">
		  <option <?php if($this->input->get('gift_id') == '' ):?>selected<?php endif;?> value="">全部</option>
		  <?php foreach($gitf_opts as $id=>$name):?>
		  <option <?php if($this->input->get('gift_id') == $id ):?>selected<?php endif;?> value="<?php echo $id?>"><?php echo $name?></option>
		  <?php endforeach;?>
		</select>
		</div>
		<input type="submit" name="do" class="btn btn-primary" value="查詢">
		<label class="btn btn-warning btn-file">
		    上傳序號資料 <input type="file" style="display: none;">
		</label>
		<label class="btn btn-warning btn-file">
		    上傳中獎使用人資料 <input type="file" style="display: none;">
		</label>
		<label class="btn btn-warning btn-file">
		    上傳獎品資料 <input type="file" style="display: none;">
		</label>
		</form>
		<h3>查詢結果</h3>
		<div class="row">
			<div class="col-xs-12">
			<table class="table table-striped">
				<tr>
					<th>流水號</th>
					<th>序號</th>
					<th>客戶姓名</th>
					<th>兌獎時間</th>
					<th>客戶電話</th>
				</tr>
				<?php foreach($datalist['list'] as $data):?>
				<tr>
					<td><?php echo $data->id?></td>
					<td><?php echo $data->sn?></td>
					<td><?php echo $data->username?></td>
					<?php if($data->played_at):?>
					<td><?php echo date('Y-m-d H:i:s',strtotime($data->played_at))?></td>
					<?php else:?>
					<td>&nbsp;</td>
					<?php endif;?>
					<td><?php echo $data->phone?></td>
				</tr>
				<?php endforeach;?>
			</table>
			</div>
		</div>
		<div class="row">
		    <div class="col-xs-12">
            <?php echo $datalist['pagination']['html'] ?>
            <?php echo $datalist['pagination']['total_rows'] ?>
		    </div>
		</div>
		</div>
	</body>
</html>

