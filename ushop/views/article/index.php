<style>
.post-detail {
	padding: 8px 20px;
}

#timeline .timeline-divider .divider-label.timeline-year {
	font-size: 30px;
	border: none;
	width: 250px;
	text-align: left;
	padding-left: 15px;
}

.divider-label:before {
	background: none !important;
}

.year-icon {
	background: url(/assets/news/arrow.png);
	background-repeat: no-repeat;
	position: absolute;
	width: 20px;
	height: 32px;
	top: 0;
	left: 0;
	margin-top: 3px;
	margin-left: 160px;
}

.thumbnail {
	border: none;
}

.panel-title {
	font-size: 21px;
	color: #000;
}

.panel-heading {
	background: #FFFFFF;
	border-bottom: none;
}

.btnone {
	border-top: none;
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

.blog-author span {
	display: inline-block;
	color: #3bafda;
	font-size: 20px;
}

.panel, .panel *, .thumbnail {
	border: none;
}

.caption {
	font-size: 16px;
}



/* .timeline-year .glyphicon { */
/* 	color: #7814a2; */
/* 	margin: 7px 5px; */
/* 	position: absolute; */
/* } */

.btntwo {
	display: none;
}

@media ( max-width : 992px) {
	.btnone {
		display: none;
	}
	.btntwo {
		display: block;
	}
/* 	.col-md-12, .panel-heading { */
/* 		padding: 0; */
/* 	} */
}
</style>
<div class="container self news detail page-container">
	<div class="row post-detail">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="timeline-year"><?php echo $article_date["year"];?> News 
            <span class="glyphicon glyphicon-triangle-right"
						aria-hidden="true"></span> </div>
				</div>
				<div class="panel-heading">
					<span class="panel-title"><?php echo $article["blog-title"];?></span>
				</div>
				<div class="panel-heading btnone">
					<div class="pull-left ml10">
						<?php echo date("Y-m-d",strtotime($article["raw-date"]));?>
						<div class="blog-author">
							<div class="icon-author"></div>
							By <span><?php echo $article["author"];?></span>
						</div>
					</div>
					<div class="pull-right">
						<div class="fb-like" style="width: 263px;"
							data-href="/News/detail?id=<?php echo $article["id"];?>"
							data-layout="standard" data-action="like" data-show-faces="true"
							data-share="true"></div>
					</div>
				</div>
				<div class="panel-heading btntwo">
					<div class="pull-left ml10">
						<?php echo date("Y-m-d",strtotime($article["raw-date"]));?>
						<div class="blog-author">
							<div class="icon-author"></div>
							By <span><?php echo $article["author"];?></span>
						</div>
					</div>
				</div>
				<div class="panel-heading btntwo">
					<div class="pull-left">
						<div class="fb-like" style="width: 263px;"
							data-href="/News/detail?id=<?php echo $article["id"];?>"
							data-layout="standard" data-action="like" data-show-faces="true"
							data-share="true"></div>
					</div>
				</div>
				<div class="panel-body">
					<div class="">
						<img src="<?php echo $article['blog-extra']["src"];?>" alt="">
						<div class="">
							<?php echo $article['blog-content'];?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>