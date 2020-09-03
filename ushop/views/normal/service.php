<style>
.tab-block {
  margin: 0 25px;
  border: 5px #e5e5e5 solid;
}
.tab-block .tab-content {
  /* border: 1px solid #e5e5e5; */  
  border: none;
}
.panel-heading {
  border: none;
  padding-left: 32px;
  border-bottom: 1px #e5e5e5 solid;
  height: 34px;
  line-height: 34px;
}
.collapse.in {
  margin-top: 0px;
  text-align: left;
  position: relative;
}
.panel-title {
  font-size: 22px;
  color:#56b135;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 100%;
}
.panel-title a[aria-expanded="true"] {
  color: #000;
}
.tab-block .nav-tabs {
  background: #e5e5e5;
}
.nav-tabs.nav-tabs-right > li {
  background: white;
}
.tab-block .nav-tabs > li > a {
  background: #E5E5E5;
}

.icon-qa {
  background: url(/assets/service/icon_p.jpg);
  background-repeat: no-repeat;
  background-size: 24px 24px;
  position: absolute;
  width: 24px;
  height: 24px;
  margin-left: -30px;
}
.panel-title a[aria-expanded="true"] .icon-qa {
  background: url(/assets/service/icon_m.jpg);
}
.media {
}

.file-size{
  font-size: 8px;
  padding-left: 12px;
  color: rgb(158, 158, 158);
}
img {
  max-width: 100%;
}
.control-bar {
  padding: 20px 15px;
  position: relative;
  z-index: 5;
  text-align: center;
  background: #fff;
  height: 65px;
}
.page-title {
  font-size: 32px;
  text-align: left;
  font-weight: bold;
  margin-top: -4px;
}
.no-mplr {
  margin-left:0 !important;
  padding-left: 0 !important;
  margin-right:0 !important;
  padding-right: 0 !important;  
}
@media ( max-width: 992px ) { 
  .no-mplr {
	margin-bottom: 15px !important; 
  }
  .tab-block {
	  position: relative;
	  margin-top: 100px !important;
	  z-index: 5;
  }
}
</style>
<div class="container page-container">
	<div class="col-sm-12 control-bar mb15">
		<div class="form-group center-block">
			<div class="col-md-3">
				<div class="page-title"> <?php echo $PageMeta['value']['title'];?> </div>
			</div>
            <div class="col-md-4 no-mplr">
                <span class="append-icon right"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" id="keyword">
            </div>
            <div class="col-md-2 no-mplr">
				<a class="btn btn-success btn-block" onclick="keywordSearch();">Search</a>
            </div>
			<div class="col-md-3"></div>
			<div class="clearfix"></div>
        </div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<div class="tab-block mb25 mt25">
        <ul class="nav nav-tabs nav-tabs-right">
            <li>
                <a href="#tab7_<?php echo count($listType);?>" data-toggle="tab">File</a>
            </li>
		<?php 
			arsort($listType);
			foreach( $listType AS $k=>$row )
			{
		?>
            <li>
                <a href="#tab7_<?php echo $k;?>" data-toggle="tab"><?php echo $row["type"];?></a>
            </li>
		<?php
			}
		?>
        </ul>
        <div class="tab-content">
		
		<?php 
			$ind = 0;
			foreach( $listType AS $k=>$row )
			{
		?>
            <div id="tab7_<?php echo $k;?>" class="tab-pane">
			
				<div class="panel-group" id="FAQ-<?php echo $k;?>" role="tablist" aria-multiselectable="true">
<?php 
	$expanded 	= "true";
	$collapse	= "in";
	foreach( $listQuest AS $quest )
	{
		if( $quest["type_id"] == $row["id"] )
		{
?>
  <div class="panel">
    <div class="panel-heading" role="tab" id="heading-<?php echo $ind;?>">
	  
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#FAQ-<?php echo $k;?>" href="#collapse-<?php echo $ind;?>" aria-expanded="<?php echo $expanded;?>" aria-controls="collapse-<?php echo $ind;?>">
		<div class="icon-qa"></div>
          <?php echo $quest["quest"];?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $ind;?>" class="panel-collapse collapse <?php echo $collapse;?>" role="tabpanel" aria-labelledby="heading-<?php echo $ind;?>">
      <div class="panel-body">
		<?php echo $quest["answer"]["html"];?>
      </div>
    </div>
  </div>
<?php
		}
		$expanded = "false";
		$collapse = "";
		$ind++;
	}
?>         
				</div>
			</div>
		<?php
			}
		?>
            <div id="tab7_<?php echo count($listType);?>" class="tab-pane active"> 
		<?php
			$fileCnt = 0;
			foreach( $listFile AS $file )
			{
		?>	
				<div class="media">
					<div class="media-left" href="#">
						<img alt="50x50" src="http://www2.psd100.com/icon/2013/09/1001/File-icon-0910125025.png" style="width: 50px; height: 50px;">
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $file;?> <span class="file-size"><?php echo FileSizeConvert(filesize(ROOTPATH."/file/userfiles/".$file));?></span></h4> 
						<a class="btn btn-info btn-download-link" href="/file/core/connector/php/connector.php?command=DownloadFile&type=Files&currentFolder=%2F&langCode=zh-tw&hash=87e842e16a966e09&FileName=<?php echo urlencode($file);?>">下載</a>						
					</div>
				</div>
				
		<?php
			}
		?>			
			</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://www.webpage.idv.tw/maillist/maillist4/pro/03/copy.js"></script>
<script>
	$(function(){
		$("a[href=\"#tab7_0\"]").get(0).click();
		
	});
	function keywordSearch()
	{
		location.href = "/query?q="+$("#keyword").val();
	}

</script>