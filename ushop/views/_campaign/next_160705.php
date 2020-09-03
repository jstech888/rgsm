<?php $this->load->view('campaign/tabs')?>
<form action="?" method="post" >
	<input type="hidden" name="_r" value="<?php echo rand()?>">
	<input type="hidden" name="step" value="next">
	<input type="hidden" name="sn" value="<?php echo $this->input->post('sn')?>"?>
	<label>贈品名稱</label>
	<?php echo $gift->title?>
	<br/>
	<label>抽獎序號</label>
	<?php echo $this->input->post('sn')?>
	<br/>
	<label>活動期間</label>
	23424
	<br/>
	<label>贈品收件人</label>
	<input type="text" name="username">
	<?php echo @$error['username']?>
	<br/>
	
	<label>贈品送達地址</label>
	<input type="text" name="addr">
	<?php echo @$error['addr']?>
	<br/>
	
	<label>收件人電話</label>
	<input type="text" name="phone">
	<?php echo @$error['phone']?>
	<br/>
	
	<label>收件人email</label>
	<input type="text" name="email">
	<?php echo @$error['email']?>
	
	<input type="submit" name="do" value="送出">
</form>
