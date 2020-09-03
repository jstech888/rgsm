<style>
.menu-contain-selector a {
  text-align: center;
}
.white-popup {
  position: relative;
  background: #FFF;
  width: 90% ;
  max-width: 90% !important;
  margin: 20px auto;
}
#list-textarea {
  width: 100%;
  height: 300px;
}
.hint {
  margin: 5px 0;
}
.col-lg-12 {
	padding:0;
}
.image-list {
	float:left;
}
.image-list {
  margin: 15px 0;
  padding: 0;
}
.control-label {
  font-size: 18px;
  text-align: right;
  line-height: 39px;
}
.list-row {
	border-bottom:1px solid #e4e4e4;
	margin-bottom:5px;
	padding:5px 0 ;
}
.caret-tp hidden-xs {
  display: inline-block !important;
  margin: 10px;
}
label.radio {
  position:	inherit !important; 
  margin-right: inherit !important; 
  background: inherit !important; 
  display: inherit !important; 
  border: 1px #eee solid !important; 
  height: inherit !important; 
  width: inherit !important; 
  top: inherit !important; 
  border-radius:0 !important;
}
</style>
<div id="modal-form" class="popup-basic white-popup admin-form mfp-with-anim mfp-hide admin-modals-page" modal-method="create">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-rocket"></i>新增主選單</span>
        </div>
        <!-- end .panel-heading section -->

        <form method="post" action="/" id="comment">
            <div class="panel-body p25">
				<div class="section row">
					<div class="col-sm-12">
						<h5 class="text-muted mtn mb30">選單名稱</h5>
					</div>
					<div class="col-sm-12">
						<input type="text" name="title" id="modal-title" class="gui-input" placeholder="名稱">
					</div>
				</div>
				<div class="section row">
					<div class="col-sm-12">
						<h5 class="text-muted mtn mb30">選單連結</h5>
					</div>
					<div class="col-sm-12">
						<input type="text" name="href" id="modal-href" class="gui-input" placeholder="/">
					</div>
				</div>
				<div class="section row menu-contain-selector">
					<div class="col-sm-12">
						<h5 class="text-muted mtn mb30">選擇內容</h5>
					</div>
					<div class="col-md-3">
						<a class="holder-style p15 mb20 holder-active" href="#editor-link">
							<span class="fa fa-link fs40 holder-icon"></span>
							<br> 主選單連結
						</a>
					</div>
					<div class="col-md-3">
						<a class="holder-style p15 mb20" href="#editor-list">
							<span class="fa fa-list-ul fs40 holder-icon"></span>
							<br> 子選單標題連結
						</a>
					</div>
					<div class="col-md-3">
						<a class="holder-style p15 mb20" href="#editor-listLink">
							<span class="fa fa-list-ul fs40 holder-icon"></span>
							<br> 子選單項目連結
						</a>
					</div>
				</div>
				<!-- end section row section -->
	
				<div class="section menu-contain-editor">
					<div class="tab-content">
						<div id="editor-link" class="tab-pane active">
						</div>
						<div id="editor-list" class="tab-pane">
							<div class="col-lg-12">
								<div class="hint" ></div>
								<div class="clearfix"></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group list-row sample-list">
									<label for="title" class="col-lg-1 control-label">名稱</label>
									<div class="col-lg-3">
										<input type="text" class="form-control list-title" placeholder="title...">
									</div>
									<div class="col-lg-2 text-right">
										<select class="multiselect1">
											<option value="title">標頭</option>
											<option value="href" selected>連結</option>
										</select>
									</div>
									
									<label for="href" class="col-lg-1 control-label list-content">連結</label>
									<div class="col-lg-5 list-content">
										<input type="text" class="form-control list-href" placeholder="links...">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group add-row">
									<div class="col-lg-12 text-center">
										<a href="#modal-form" class="btn ladda-button btn-info .btn-xs add-list-row" data-style="zoom-in">
											<span class="ladda-label"><span class="glyphicons glyphicons-circle_plus"></span> 添加一列</span>
											<span class="ladda-spinner"></span>
										</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div id="editor-listLink" class="tab-pane">
							<div class="col-lg-12">
								<div class="hint" ></div>
								<div class="clearfix"></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group list-row sample-list">
									<label for="title" class="col-lg-1 control-label">名稱</label>
									<div class="col-lg-3">
										<input type="text" class="form-control list-title" placeholder="title...">
									</div>
									<div class="col-lg-2 text-right">										
										<h2>連結</h2>
									</div>
									<label for="href" class="col-lg-1 control-label list-content">連結</label>
									<div class="col-lg-5 list-content">
										<input type="text" class="form-control list-href" placeholder="links...">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group add-row">
									<div class="col-lg-12 text-center">
										<a href="#modal-form" class="btn ladda-button btn-info .btn-xs add-list-row" data-style="zoom-in">
											<span class="ladda-label"><span class="glyphicons glyphicons-circle_plus"></span> 添加一列</span>
											<span class="ladda-spinner"></span>
										</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
					</div>
				</div>
				<!-- end section -->
            </div>
            <!-- end .form-body section -->

            <div class="panel-footer">
				<button type="button" class="btn ladda-button btn-info modal-finish" data-style="zoom-in">
					<span class="ladda-label"> 新增</span>
					<span class="ladda-spinner"></span>
				</button>
            </div>
            <!-- end .form-footer section -->
        </form>
    </div>
    <!-- end: .panel -->
</div>