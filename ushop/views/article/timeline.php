<style>
#timeline.timeline-single {
	margin-bottom: 30px;
}

#timeline.timeline-single .timeline-divider .divider-label {
	/*   margin-left: -3%; */
	/*   width: 180px; */
	
}

/* #timeline .timeline-divider .divider-label.timeline-year { */
/* 	font-size: 30px; */
/* 	border: none; */
/* 	width: 250px; */
/* 	text-align: left; */
/* 		padding-left: 15px;  */
/* } */
.divider-label:before {
	background: none !important;
}

.year-icon {
	background: url(/assets/news/arrow.png);
	background-repeat: no-repeat;
	position: absolute;
	width: 20px;
	height: 32px;
	right: 0;
	margin-top: -38px;
	margin-right: 50px;
}

#timeline .timeline-icon {
	background: none;
	box-shadow: none;
}

.text-transparent {
	color: transparent;
}

.timeline-dot {
	background: url(/assets/news/icon_circle.png);
	background-repeat: no-repeat;
	/*   position: absolute; */
	width: 26px;
	height: 24px;
	top: 0;
	left: 0;
	/*   margin-left: -3px; */
	/*   margin-top: -1px; */
}

.timeline-blog-content {
	max-height: 300px;
	height: 300px;
	overflow: hidden;
}

/* .btn-moredetail { */
/* 	background: url(/assets/news/btn_moredetail_bg.png); */
/* 	background-repeat: no-repeat; */
/* 	color: #fff; */
/* 	border: none; */
/* } */

.panel-title {
	font-size: 21px;
	color: #000;
}

.panel-heading {
	background: #FFFFFF;
	border-bottom: none;
	height: 80px;
}

.panel-body {
	background: #FFFFFF;
	border-bottom: none;
}

.panel-footer {
	background: #FFFFFF;
	border-top: none;
	height: 120px;
}

.icon-author {
	background: url(/assets/news/icon_people.png);
	background-repeat: no-repeat;
	width: 15px;
	height: 16px;
	position: absolute;
	margin-left: -19px;
	margin-top: 11px;
}

.blog-author {
	padding-left: 20px;
	display: inline-block;
	line-height: 36px;
}

/* .blog-author span { */
/* 	display: inline-block; */
/* 	color: #3bafda; */
/* 	font-size: 20px; */
/* } */

.mobile-article {
	display: none;
}

@media ( max-width : 992px) {
	.hidden-992 {
		display: none;
	}
	.show-992 {
		display: block;
	}
}

.mobile-panel {
	margin: 0px 10px;
	margin-bottom: 25px;
}

.mobile-panel:first-child {
	margin-top: 25px;
}

.mobile-article .timeline-year {
	padding-left: 6px;
	font-size: 26px;
}

.mobile-article .year-icon {
	margin-top: 3px;
	margin-right: 142px;
}

.control-bar {
	padding: 20px 15px;
	position: relative;
	z-index: 5;
	text-align: center;
	background: rgb(213, 213, 213);
}

.no-mplr {
	margin-left: 0 !important;
	padding-left: 0 !important;
	margin-right: 0 !important;
	padding-right: 0 !important;
}

#timeline.timeline-single {
	max-width: 100%;
	margin-right: 50px;
}

@media ( max-width : 992px ) {
	.no-mplr {
		margin-bottom: 15px !important;
	}
	.mobile-article .year-icon {
		margin-top: -37px;
		margin-left: 159px;
		left: 0;
	}
}
</style>

<div class="container self page-container">
	<div class="row mt25">
		<div class="col-sm-12 control-bar form-inline mb15">
		
		
		

  <div class="form-group">
    <label for="news-search"><i class="fa fa-search"></i></label>
    <input type="text" class="form-control" id="news-search" onkeyup="saveTemp(this);">
  </div> 
  
  <div class="form-group">



				<div class="seleyear">
					<select class="form-control" onchange="changeYear(this)">		
				<?php echo isset($_GET["q"]) ? '<option value="n">Query</option>' : ""; ?>
					<option
							value="n<?php if ( ! in_array( $getYear, $listTime ) ) echo " selected" ?>">ALL</option>
				<?php
    foreach ( $listTime as $year => $listMon )
    {
      $isSel = ( $year == $getYear ) ? "selected" : "";
      ?>
					<option value="<?php echo $year;?>" <?php echo $isSel;?>><?php echo $year;?></option>
				<?php
    }
    ?>
				</select>
				</div>
			</div>
			
   
  <a class="btn btn-success"
						onclick="keywordSearch();">Search</a>

</div>

		
		
		
			
		</div>
		<div class="clearfix"></div>
		<div class="mobile-article show-992">		
	<?php
if ( count( $listTime ) == 0 )
{
  ?>		
			<div class="panel mt20">
				<div class="panel-heading" style="border: none;">
					<span class="text-muted">no result</span>
				</div>
			</div>	
		<?php
}
foreach ( $listTime as $year => $listMon )
{
  if ( $year == $getYear || $getYear == "n" )
  {
    ?>
				<div class="panel mt20">
				<div class="panel-heading" style="border: none;">
					<span class="timeline-year"><?php echo $year;?> News 
					
					<div class="year-icon"></div> </span>
				</div>
			</div>	
				<?php
    foreach ( $listMon as $mon => $listRec )
    {
      foreach ( $listRec as $ind => $rec )
      {
        $markDate = date( "Y-m-d", strtotime( $rec [ "markDate" ] ) );
        echo "<div class=\"panel mobile-panel\">
								<div class=\"panel-heading\">
									<span class=\"panel-title\">{$rec["blog-title"]}</span>
								</div>
								<div class=\"panel-body timeline-blog-content\">
									<div class=\"pull-left\">
										<span class=\"text-muted\">{$markDate}</span>				
									</div>			
									<div class=\"clearfix\"></div>
									{$rec["blog-content"]}
								</div>
								<div class=\"panel-footer\">
									<div class=\"pull-left\">
										<div class=\"blog-author\"><div class=\"icon-author\"></div> By <span style=\"display:inline-block\">{$rec["author"]}</span></div>
										<div class=\"fb-like\" data-href=\"/News/detail?id={$rec["id"]}\" data-layout=\"standard\" data-action=\"like\" data-show-faces=\"true\" data-share=\"true\"></div>										
									</div>			
									<div class=\"pull-right\">
										<a class=\"btn btn-default btn-moredetail\" href=\"/News/detail?id={$rec["id"]}\">詳細內容</a>										
									</div>									
									<div class=\"clearfix\"></div>
								</div>
							</div>	
							<div class=\"clearfix\"></div>";
      }
    }
  }
}
?>
	</div>

		<div class="mt45 timeline-single hidden-992" id="timeline">
	<?php
if ( count( $listTime ) == 0 )
{
  echo "<div class=\"timeline-divider mtn\">
					<div class=\"divider-label timeline-year\">NO-RESULT</div>
				  </div>";
}
foreach ( $listTime as $year => $listMon )
{
  if ( $year == $getYear || $getYear == "n" )
  {
    ?>
    <div class="timeline-divider mtn">
				<div class="divider-label timeline-year"><?php echo $year; ?> News <span
						class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
				</div>
			</div>
					  <?php
    
    foreach ( $listMon as $mon => $listRec )
    {
      echo "<div class=\"timeline-divider mtn\">
							<div class=\"divider-label\"><span style=\"color:#aaa;display:inline-block\">{$mon}</span> {$year}</div>
						  </div>";
      
      echo "<div class=\"row\">"; // <div class=\"col-sm-6 left-column\">";
      foreach ( $listRec as $ind => $rec )
      {
        $markDate = date( "Y-m-d", strtotime( $rec [ "markDate" ] ) );
        ?>
        <div class="timeline-item col-sm-6 left-column">
				<div class="timeline-icon"></div>
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
										<a href="/News/<?php echo $rec["id"]; ?>"><?php echo $rec["blog-title"]; ?></a></div>
						<div class="pull-right">
							<span class="text-muted"><?php echo $markDate; ?></span>
						</div>
					</div>
					<div class="panel-body timeline-blog-content">
										<?php echo $rec["blog-content"]; ?>
									</div>
					<div class="panel-footer">
						<div class="pull-left">
							<div class="blog-author">
								<div class="icon-author"></div>
								By <span style="display: inline-block"><?php echo $rec["author"]; ?></span>
							</div>
							<div class="fb-like"
								data-href="/News/detail?id=<?php echo $rec["id"]; ?>"
								data-layout="standard" data-action="like" data-show-faces="true"
								data-share="true"></div>
						</div>
						<div class="pull-right">
							<a class="btn btn-default btn-moredetail"
								href="/News/<?php echo $rec["id"]; ?>">詳細內容</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
							  <?php
      }
      // echo "<div class=\"clearfix\"></div></div></div>";
      echo "<div class=\"clearfix\"></div></div>";
    }
  }
}
?>
	</div>
	</div>
</div>
<script>
function changeYear(self)
{
	location.href = "/News?y=" + $(self).val();
}

var keyword = "";
function saveTemp(self)
{
	keyword = $(self).val();
}
function keywordSearch()
{
	location.href = "/News?q=" + keyword;
}
$(function(){
	
});
</script>


