<!-- Fancytree CSS -->
<link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.control-label {
  line-height: 38px;
  font-size: 15px;
  margin-bottom: 0;
  text-align: right;
}
.tabs-menu {
  margin-top: 15px;
}
.tabs-content  {
  padding: 20px 10px;
  border: 1px #e3e3e3 solid;
}
.nav.nav-tabs{
  border-bottom:none;
}
.nav.nav-tabs li.active {
  background: #FFF;
}
.embed-responsive {
	height:600px;
}
.media-left {
  padding: 0;
  border: 1px #e4e4e4 solid;
  background: #eaeaea;
}
.media-left .glyphicons {
  margin: 15px;
}
.media-left {
  vertical-align: middle;
}
.dd-edit {
  top: inherit;
  bottom: 0;
}
.media-body {
  padding: 5px 25px;
  font-weight: normal;
}
ul {
  -webkit-padding-start: 20px;
}
#cke_1_top {
	width: 100%;
}
.main-langCode li,
.main-langCode li {
	cursor: pointer;
}

.img-container {
  position: relative;
  display: inline-block !important;
  margin-left: 5px;
  margin-top: 5px;
  cursor: pointer;
  max-width: 110px;
}
.img-container img:hover {
  border-color: #000;
}


.product-img-container {
  position: relative;
  display: inline-block;
}


.btn-img-alt {
  width: 100%;
  background: rgba(0,0,0,0.6);
  color: #fff;
  position: absolute;
  margin-top: -20px;
  cursor: default;
  left: 0;
  line-height: 22px;
  height: 22px;
  bottom: 0;
}
.btn-tools {
  position: absolute;
  top: 0;
  right: 0;
  display: none;
}

.product-img-container:hover .btn-tools {
  display: block;
}

.img-container:hover .btn-tools {
  display: block;
}
</style>
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
		<?php
			include_once(dirname(dirname(__FILE__))."/widget/headerBar.php");
		?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
		<?php
			include_once(dirname(dirname(__FILE__))."/widget/MainMenu.php");
		?>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a>產品管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>產品編輯</a>
                        </li>
                    </ol>
                </div>
                <div class="topbar-right">
					<!-- <input type="radio" name="show" class="widget-isShow" checked> -->
                </div>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section class="table-layout animated fadeIn">
                <!-- begin: .tray-center -->
                <div class="tray tray-center p30 pb0 va-t animated-delay"  data-animate="1100">
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400"></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
								<div class="panel">
									<div class="panel-heading text-center">
										<div class="caption">
											編輯區塊
										</div>
									</div>
									<div class="panel-body">

										<div class="col-sm-12 mb15">
											<div class="form-group">
												<label for="product-key" class="col-xs-4 col-md-3 col-lg-2 control-label">SEO 網址搜索名稱</label>
												<div class="col-xs-7 col-md-8 col-lg-9">
													<input id="product-key" type="text" class="form-control" value="<?php echo $data_product['priceKey']?>" onkeyup="saveMainKey(this);">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>

										<div class="panel mb30" id="p6">
											<div class="panel-heading">
												<span class="panel-title"> 類別編輯器 <span id="echoSelection2"></span></span>
												<input type="hidden" id="parendId" />
											</div>
											<div class="panel-body">
												<?php if( $isNew === false ) { ?>
													<h2 id="tree6desp" class="text-center">新增產品無法設定類別</h2>
													<div id="tree6"></div>
												<?php } else { ?>
												<div id="tree6"></div>
												<!--
											<div class="form-group">
												<label for="product-parent-id" class="col-xs-4 col-md-3 col-lg-2 control-label" >父類別</label>
												<div class="col-xs-7 col-md-8 col-lg-9">
													<select class="form-control" onchange="saveTempProductData('parentId',this);">
														<option value="0">無</option>
														<?php echo $OptionList;?>
													</select>
												</div>
											</div>
													<div class="clearfix"></div>
													 -->
												<?php } ?>
											</div>
										</div>


										<div class="clearfix"></div>

										<div class="panel mb30" id="p6">
											<div class="panel-heading">
												<span class="panel-title"> 庫存設定 </span>
											</div>
											<div class="panel-body product-stock-panel-body">
                      <div class="col-sm-12 mb15">
                          <div class="form-group">
                              <label for="product-itemNo" class="col-xs-4 col-md-3 col-lg-2 control-label">商品屬性</label>
                              <div class="col-xs-7 col-md-8 col-lg-9 checkbox">
                                <label>
                                <input type = "checkbox" class="checkType" value="1" <?php if (in_array(1, @$data_product['type'])){?>checked<?php }?> /> 一般商品
                                </label>
                                <label>
                                <input type = "checkbox" class="checkType" value="2" <?php if (in_array(2, @$data_product['type'])){?>checked<?php }?> /> 主題促銷商品
                                </label>
                                <label>
                                <input type = "checkbox" class="checkType" value="3" <?php if (in_array(3, @$data_product['type'])){?>checked<?php }?> /> 加購商品
                                </label>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="clearfix"></div>
												<div class="col-sm-12 mb15">
													<div class="form-group">
															<label for="product-itemNo" class="col-xs-4 col-md-3 col-lg-2 control-label">item#</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="product-itemNo" type="text" class="form-control" value="<?php echo $data_product['itemNo']?>" onkeyup="saveTempProductData('itemNo',this);">
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="clearfix"></div>

													<div class="form-group">
														<label for="product-formart-type" class="col-xs-2 control-label">規格</label>
														<div class="col-xs-7">
															<?php
																$isF = $data_stock[0]['formatType'] == "F"?"selected":"";
																$isA = $data_stock[0]['formatType'] == "F"?"":"selected";
															?>
															<select id="product-formart-type" class="form-control" onchange="productStock.change(this.value);">
																<option value="F" <?php echo $isF;?>>F(固定尺寸)</option>
																<option value="A" <?php echo $isA;?>>A(參考尺寸)</option>
															</select>
														</div>
														<div class="clearfix"></div>
													</div>
													<?php
														$isFHide = $data_stock[0]['formatType'] == "F"?"":'style="display:none;"';
														$isAHide = $data_stock[0]['formatType'] == "F"?'style="display:none;"':"";
													?>
													<div class="form-group F-formatType-content formatType-content" <?php echo $isFHide;?>>
														<label for="product-qty" class="col-xs-2 control-label">數量</label>
														<div class="col-xs-7">
															<input id="product-qty" type="text" class="form-control" onkeyup="saveTempStockData(0,'value',this);" value="<?php echo $data_stock[0]['value']?>">
														</div>
														<div class="clearfix"></div>
													</div>

                                                    <div class="form-group F-formatType-content formatType-content" <?php echo $isFHide;?>>
                                                      <label for="product-qty" class="col-xs-2 control-label">低庫存警告數量</label>
                                                      <div class="col-xs-7">
                                                        <input id="product-qty" type="text" class="form-control" onkeyup="saveTempStockData(0,'warnValue',this);" value="<?php echo $data_stock[0]['warnValue']?>">
                                                      </div>
                                                    <div class="clearfix"></div>
                                                    </div>

													<div class="A-formatType-content formatType-content" <?php echo $isAHide;?>>
														<div class="tab-block mb25">
															<ul class="nav nav-tabs tabs-border">
																<li  id="tab-formatType-1"  class="tab-formatType active">
																	<a href="#tab-formatType-1" data-toggle="tab" onclick="formatTypeContent.changeTab(1)">規格 1</a>
																</li>
																<li class="plus-formart-type">
																	<a onclick="formatTypeContent.add();"><span class="fa fa-plus"></span>
																	新增</a>
																</li>
															</ul>
															<div class="tab-content">
																<div id="tab-pane-formatType-1" class="tab-pane tab-pane-formatType active">
																	<div class="form-group">
																		<label for="formatType-1-often" class="col-xs-2 control-label">常用規格</label>
																		<div class="col-xs-6">
																			<select id="formatType-1-often" class="form-control" dataIndex="1" onchange="oftenFormartType.apply('1');">
																				<option value="none">其它</option>
																				<?php foreach( $formartTypeClass AS $row ) { ?>
																				<option value="<?php echo $row["content"];?>"><?php echo $row["title"];?></option>
																				<?php } ?>
																			</select>
																		</div>
																		<div class="col-xs-3">
																			<a class="btn btn-warning btn-addToOften" onclick="oftenFormartType.add('1');">加入常用規格</a>
																		</div>
																		<div class="clearfix"></div>
																	</div>
																	<div class="form-group">
																		<label for="formatType-1-title" class="col-xs-2 control-label">規格名稱</label>
																		<div class="col-xs-6">
																			<input id="formatType-1-title" type="text" class="form-control formatType-A-title" value="" />
																		</div>
																		<div class="clearfix"></div>
																	</div>
																	<div class="form-group">
																		<label for="formatType-1-content" class="col-xs-2 control-label">參考規格</label>
																		<div class="col-xs-6">
																			<input id="formatType-1-content" type="text" class="form-control formatType-A-content" value="">
																			<span class="help-block mt5"><i class="fa fa-bell"></i> 以 半形/分隔各尺寸，例如：S/M/L/XL/2XL</span>
																		</div>
																		<div class="clearfix"></div>
																	</div>

																</div>
															</div>
															<div class="col-md-12 mt15 text-center">
																<a class="btn btn-info btn-applyFormatTypeTable" onclick="formatTypeTable.apply();">建立規格</a>
															</div>
															<div class="clearfix"></div>
																<div class="panel" id="formatType-sample-table" style="display:none">
																		<div class="panel-heading">
																			<span class="panel-title"><span class="glyphicons glyphicons-table"></span>規格庫存對應表</span>
																		</div>
																		<div class="panel-body pn">
																			<table class="table table-striped">
																				<thead>
																				</thead>
																				<tbody>
																				</tbody>
																			</table>
																		</div>
																	</div>
														</div>
													</div>
											</div>
										</div>

										<div class="helper pull-right" style="color:red;cursor:default;">其它貨幣，採商訂設定中之參考匯率計算。</div>
										<div class="tabs-menu main-isoCode ">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active"><a data-isocode="TWD">TWD</a></li>
											</ul>
										</div>
										<div class="tabs-content isoCode-tab-content">

											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-price-term" class="col-xs-4 col-md-3 col-lg-2 control-label">價格分類</label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<select id="product-price-term" class="form-control" onchange="priceTermChange(this);">
														<?php
															$isForever 	= ($data_price[$Currency]['term'] == "forever")?"selected":"";
															$isSOff	 	= ($data_price[$Currency]['term'] == "specialoffer")?"selected":"";
														?>
															<option value="forever" <?php echo $isForever;?>>常態</option>
															<option value="specialoffer" <?php echo $isSOff;?>>期間</option>
														</select>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<?php $isDateRangePickerShow = ($data_price[$Currency]['term'] == "specialoffer")?"display:block;":"display:none;"; ?>
											<div class="col-sm-12 product-term-soff-block mb15" style="<?php echo $isDateRangePickerShow;?>">
												<div class="form-group">
													<label class="col-xs-4 col-md-3 col-lg-2  control-label" for="daterangepicker1"></label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<div class="input-group date pull-right">
															<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
															<input type="text" class="form-control pull-right" name="daterange" id="daterangepicker1" value="<?php echo $data_price[$Currency]['begin'].' - '.$data_price[$Currency]['end'];?>">
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-price-normal" class="col-xs-4 col-md-3 col-lg-2 control-label">定價</label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<input id="product-price-normal" type="text" class="form-control" onkeyup="saveTempPriceData('normal',this);" value="<?php echo $data_price[$Currency]['normal']?>">
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-price-sell" class="col-xs-4 col-md-3 col-lg-2 control-label">售價（會員／促銷價）</label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<input id="product-price-sell" type="text" class="form-control" onkeyup="saveTempPriceData('value',this);" value="<?php echo $data_price[$Currency]['value']?>">
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-price-sell" class="col-xs-4 col-md-3 col-lg-2 control-label"></label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<p class="helper" style="color:red;cursor:default;" >定價 及 售價 為 "0" 前台不會顯示。</p>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="tabs-menu main-langCode ">
											<ul class="nav nav-tabs" role="tablist">
												<?php echo $htmlLangDefault;?>
											</ul>
										</div>
										<div class="tabs-content main-tab-content">

											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-name" class="col-xs-4 col-md-3 col-lg-2 control-label">名稱</label>
													<div class="col-xs-7 col-md-8 col-lg-9">
														<input id="product-name" type="text" class="form-control" value="<?php echo $data_detail[$DEFAULTLANG]['name']?>" onkeyup="saveTempDetailData('name',this);">
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>

											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="product-src" class="col-xs-4 col-md-3 col-lg-2 control-label">首圖</label>
													<div class="col-xs-7 col-md-8 col-lg-9 text-center mb15">
														<a class="btn btn-success btn-block" onclick="selectMediaStack();">
															<i class="glyphicon glyphicon-plus"></i>
															<span>選擇照片( 800 x 800 pixel)</span>
														</a>
													</div>
													<label for="product-src" class="col-xs-4 col-md-3 col-lg-2 control-label"></label>
													<div class="col-xs-7 col-md-8 col-lg-9 text-center" style="padding: 5px;">
														<div class="product-img-container">
															<img id="product-image" class="img-thumbnail image-product-remove" style="height:150px;" src="<?php echo $data_detail[$DEFAULTLANG]["src"];?>">
															<div class="btn btn-xs btn-img-alt"><?php echo $data_detail[$DEFAULTLANG]["alt"];?></div>
															<div class="btn-group btn-tools">
																<div class="btn btn-warning btn-xs btn-edit-img-alt" onclick="productImageALT();"><span class="glyphicons glyphicons-pencil"></span></div>
															</div>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>

											<div class="col-sm-12 mb15">
												<div class="form-group">
													<label for="upload-image-slider" class="col-xs-4 col-md-3 col-lg-2 control-label">內頁輪播</label>
													<div class="col-xs-7 col-md-8 col-lg-9 text-center" onclick="selectMediaStackSlider();">
														<a class="btn btn-success btn-block">
															<i class="glyphicon glyphicon-plus"></i>
															<span>選擇照片( 800 x 800 pixel)</span>
														</a>
													</div>
													<label for="upload-image-slider" class="col-xs-4 col-md-3 col-lg-2 control-label"></label>
													<div class="col-xs-7 col-md-8 col-lg-9 product-image-slider-container text-center">
														<?php
															if( isset($data_detail[$DEFAULTLANG]["value"]["image"]) )
															{
																foreach( $data_detail[$DEFAULTLANG]["value"]["image"] AS $image )
																{
														?>
															<div class="img-container">
																<img class="img-thumbnail" style="height:100px;" src="<?php echo $image["url"];?>" />
																<div class="btn btn-xs btn-img-alt"><?php echo (isset($image["alt"]))?$image["alt"]:"";?></div>
																<div class="btn-group btn-tools">
																	<div class="btn btn-warning btn-xs btn-edit-img-alt" onclick="sliderImageALT('<?php echo $image["url"];?>', this);"><span class="glyphicons glyphicons-pencil"></span></div>
																	<div class="btn btn-danger btn-xs btn-img-remove" onclick="sliderImageRemove('<?php echo $image["url"];?>',this);"><span class="glyphicons glyphicons-remove"></span></div>
																</div>
															</div>
														<?php
																}
															}
														?>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>

											<div class="tab-block mb25">
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#tab5_1" data-toggle="tab">商品簡介</a>
													</li>
												</ul>
												<div class="tab-content">
													<div id="tab5_1" class="tab-pane active">
														<div class="form-group">
															<label class="col-xs-4 col-md-3 col-lg-2 control-label">標題</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="cTitle1" type="text" class="form-control" onkeyup="saveTempDetailValue('title',false,false,this);" value="<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["title"]))?$data_detail[$DEFAULTLANG]["value"]["title"]:"";?>">
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="col-sm-12 mb15">
															<textarea name="ckeditor1" id="ckeditor1" rows="12">
															<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["description"]))?$data_detail[$DEFAULTLANG]["value"]["description"]:"";?>
															</textarea>
															<div class="clearfix"></div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
											<div class="tab-block mb25">
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#tab6_1" data-toggle="tab">商品特色</a>
													</li>
													<li>
														<a href="#tab6_2" data-toggle="tab">如何使用</a>
													</li>
													<li>
														<a href="#tab6_3" data-toggle="tab">影片介紹</a>
													</li>
													<li>
														<a href="#tab6_4" data-toggle="tab">退/換貨或須知</a>
													</li>
												</ul>
												<div class="tab-content">
													<div id="tab6_1" class="tab-pane active">
														<div class="form-group">
															<label class="col-xs-4 col-md-3 col-lg-2 control-label">標題</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="cTitle2" type="text" class="form-control" onkeyup="saveTempDetailValue('section',0,'title',this);" value="<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][0]["title"]:"商品特色";?>">
															</div>
															<div class="clearfix"></div>
														</div>
														<textarea name="ckeditor2" id="ckeditor2" rows="12">
														<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][0]["content"]:"";?>
														</textarea>
														<div class="clearfix"></div>
													</div>
													<div id="tab6_2" class="tab-pane">
														<div class="form-group">
															<label class="col-xs-4 col-md-3 col-lg-2 control-label">標題</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="cTitle3" type="text" class="form-control" onkeyup="saveTempDetailValue('section',1,'title',this);" value="<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][1]["title"]:"如何使用";?>">
															</div>
															<div class="clearfix"></div>
														</div>
														<textarea name="ckeditor3" id="ckeditor3" rows="12">
														<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][1]["content"]:"";?>
														</textarea>
														<div class="clearfix"></div>
													</div>
													<div id="tab6_3" class="tab-pane">
														<div class="form-group">
															<label class="col-xs-4 col-md-3 col-lg-2 control-label">標題</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="cTitle4" type="text" class="form-control" onkeyup="saveTempDetailValue('section',2,'title',this);" value="<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][2]["title"]:"影片介紹";?>">
															</div>
															<div class="clearfix"></div>
														</div>
														<textarea name="ckeditor4" id="ckeditor4" rows="12">
														<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][2]["content"]:"";?>
														</textarea>
														<div class="clearfix"></div>
													</div>
													<div id="tab6_4" class="tab-pane">
														<div class="form-group">
															<label class="col-xs-4 col-md-3 col-lg-2 control-label">標題</label>
															<div class="col-xs-7 col-md-8 col-lg-9">
																<input id="cTitle5" type="text" class="form-control" onkeyup="saveTempDetailValue('section',3,'title',this);" value="<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][3]["title"]:"退/換貨或須知";?>">
															</div>
															<div class="clearfix"></div>
														</div>
														<textarea name="ckeditor5" id="ckeditor5" rows="12">
														<?php echo (isset($data_detail[$DEFAULTLANG]["value"]["section"]))?$data_detail[$DEFAULTLANG]["value"]["section"][3]["content"]:"";?>
														</textarea>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="panel-footer">
										<div class="pull-right btn-group">
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
											<a class="btn btn-default" href="/admin/product/listTable">返回</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>


						</div>
					</div>
				</div>
				<!-- end: .tray-center -->
			</section>
			<!-- End: Content -->
        </section>
	</div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="/admin/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/editors/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>


		<!-- Fileupload included -->
		<script type="text/javascript" src="/libs/jqfileupload/js/vendor/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
		<script type="text/javascript" src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<script type="text/javascript" src="/libs/jqfileupload/js/jquery.iframe-transport.js"></script>
		<script type="text/javascript" src="/libs/jqfileupload/js/jquery.fileupload.js"></script>


    <!-- Admin Forms Javascript -->
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-monthpicker.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-touch-punch.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery.spectrum.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery.stepper.min.js"></script>


    <!-- Fancytree Plugin -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/jquery.fancytree-all.min.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.childcounter.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.columnview.js"></script>

    <!-- Fancytree Addon - Drag and Drop -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.dnd.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.edit.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.filter.js"></script>

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>

    <script type="text/javascript">

		refer_uri = <?php echo ( $isNew ) ? "false" : "'/admin/product/listTable'";?>;

		var mainKeyisChange = false;
		var old_mainKey     = '<?php echo $data_product["detailKey"];?>';
		var data_product	= <?php echo json_encode($data_product);?>;
		var data_detail 	= <?php echo json_encode($data_detail);?>;
		var data_price 		= <?php echo json_encode($data_price);?>;
		var data_stock 		= <?php echo json_encode($data_stock);?>;


		var templateProductSection = [{"title":"商品特色","content":""},{"title":"如何使用","content":""},{"title":"影片介紹","content":""},{"title":"退/換貨或須知","content":""}];
		function init_MainIsoCode()
		{
			$(".main-isoCode li a").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(e){
					$(".main-isoCode li").removeClass("active");
					$(this).parent().addClass("active");
					$(".isoCode-tab-content").fadeOut(500);
					var currency = $(this).attr("data-isocode");

					setTimeout(function(){
						loadTempCurrencyData();
						$(".isoCode-tab-content").fadeIn(500);
					},500);
				});
			});

			$('.main-isoCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
				var currency 	= $(this).attr("data-isocode");
			});

			$('.main-isoCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				var currency 	= $(this).attr("data-isocode");
			});
		}


		function saveTempStockData(inds,key,self)
		{
			data_stock[inds][key] = $(self).val();
		}

		$(function(){
			productStock.init();
			formatTypeTable.init();
			formatTypeContent.init();
		});
		var productStock = {
			core: false,
			init: function(){},
			change: function(formatType){
				if( formatType == "F")
				{
					if( data_stock[0].formatType != "F" )
					{
						var newDataStock = {};
						newDataStock[0] = $.extend( true, {}, data_stock[0] );
						newDataStock[0].formatTypeTitle = "";
						newDataStock[0].formatType = "F";
						newDataStock[0].value = 0;
						delete data_stock;
						data_stock = {};
						data_stock = newDataStock;
						$(".F-formatType-content input#product-qty").val("0");
					}
					$("#formatType-mapping-table").remove();
				}
				else
				{
					if( $("#tab-formatType-1").find(".form-group").is(":visible") === false )
					{
						formatTypeContent.reset();
						$("#formatType-1-often").val("none");
						$("#formatType-1-title").val("");
						$("#formatType-1-content").val("");
					}
				}
				$(".formatType-content").hide();
				$("."+formatType+"-formatType-content").show();
			}
		};

		var oftenFormartType = {
			core: false,
			init: function(){},
			apply: function(inds) {
				var self 	= "#formatType-"+inds+"-often";

				($(self).val() == "none")?$(self).parent().parent().find(".btn-addToOften").show():$(self).parent().parent().find(".btn-addToOften").hide();

				var title 	= ($(self).val() == "none")?" ":$(self).find("option:selected").text();
				var content = ($(self).val() == "none")?" ":$(self).val();

				$("#formatType-"+inds+"-title").val(title);
				$("#formatType-"+inds+"-content").val(content);

				formatTypeContent.listContent[inds].often = content;
				formatTypeContent.listContent[inds].title = title;
				formatTypeContent.listContent[inds].content = content;
			},
			add: function(inds) {
				var formartType_title 	= $("#formatType-"+inds+"-title").val();
				var formartType_content	= $("#formatType-"+inds+"-content").val();
				if( formartType_title != null
					&& formartType_content != null
					&& formartType_title.length > 0
					&& formartType_content.length > 0
				)
				{
					$.ajax({
						url: "<?php echo base_url('/admin/product/addToOften');?>",
						async:true,
						cache:false,
						method:"POST",
						data:{
							group : inds,
							title : formartType_title,
							content : formartType_content
						},
						success:function(data, status, xhr){

							var type = data.code == 1?"info":"danger";
							var text = data.code == 1?'儲存完成！':"[規格名稱]已經重複！";
							console.log(data);
							if( data.code == 1 )
							{
								$("#formatType-"+data.post.group+"-often > .last-append").removeClass("last-append");
								$("#formatType-"+data.post.group+"-often").append("<option class=\"last-append\" value=\""+formartType_content+"\">"+formartType_title+"</option>");
							}

							PM.show({ title: data.message, text: text, type: type });
						},
						error:function(xhr, stauts, err){
							PM.erro();
						}
					});
				}
				else
				{
					alert("請輸入[規格名稱]與[參考規格]！");
				}
			}
		};

		var formatTypeContent = {
			core : false,
			tabCount : 0,
			listContent: {},
			init : function() {
				this.core = {};
				this.core.tab = $(".tab-formatType").eq(0).clone();
				this.core.form = $("#tab-pane-formatType-1").clone();
				this.tabCount = $(".tab-formatType").length;

				//SP limit 2
				this.core.plus = $(".plus-formart-type").clone();

				if(data_stock[0].formatType != "F")
				{
					var level = data_stock[0].formatTypeTitle.length;

					$("#formatType-1-often").val("none");
					$("#formatType-1-title").val(data_stock[0].formatTypeTitle[0].title);
					$("#formatType-1-content").val(data_stock[0].formatTypeTitle[0].content);

					this.listContent[1] = {
						often : "none",
						title : data_stock[0].formatTypeTitle[0].title,
						content : data_stock[0].formatTypeTitle[0].content
					};
					if( level == 2 )
					{
						formatTypeContent.add();
						$("#formatType-2-often").val("none");
						$("#formatType-2-title").val(data_stock[0].formatTypeTitle[1].title);
						$("#formatType-2-content").val(data_stock[0].formatTypeTitle[1].content);
						this.listContent[2] = {
							often : "none",
							title : data_stock[0].formatTypeTitle[1].title,
							content : data_stock[0].formatTypeTitle[1].content
						};
					}

					formatTypeTable.fillDB();
				}
			},
			changeTab : function(inds) {
				$(".tab-pane-formatType").removeClass("active");
				$("#tab-pane-formatType-"+inds).addClass("active");
			},
			reload : function() {
				var index = this.tabCount;
				for(i =1;i<=index;i++)
				{
					this.listContent[i].often = $("#formatType-"+i+"-often").val();
					this.listContent[i].title = $("#formatType-"+i+"-title").val();
					this.listContent[i].content = $("#formatType-"+i+"-content").val();
				}
			},
			add : function() {

				this.tabCount++;
				var index = this.tabCount;

				this.listContent[index] = {
					often : "none",
					title : "",
					content : ""
				};


				var newTab = this.core.tab.clone();
				newTab.attr("id","tab-formatType-"+index);
				index == 1 ? "" : newTab.removeClass("active");
				newTab.find("a").attr("href","#tab-formatType-"+index);
				index == 1 ? newTab.find("a").html("規格 "+index) : newTab.find("a").html("規格 "+index+" <a class=\"btn btn-danger btn-xs\" onclick=\"formatTypeContent.remove('"+index+"');\">移除</a>");
				newTab.find("a[data-toggle=\"tab\"]").eq(0).attr("onclick","formatTypeContent.changeTab('"+index+"');");

				$(newTab).insertBefore($(".plus-formart-type"));

				var newContent = this.core.form.clone();
				newContent.attr("id","tab-pane-formatType-"+index);
				index == 1 ? "" : newContent.removeClass("active");

				newContent.find(".btn-addToOften").attr("onclick","oftenFormartType.add('"+index+"');");
				newContent.find("#formatType-1-often").attr("onchange","oftenFormartType.apply('"+index+"');");
				newContent.find("#formatType-1-title").attr("onkeyup","formatTypeContent.listContent["+index+"].title = this.value;");
				newContent.find("#formatType-1-content").attr("onkeyup","formatTypeContent.listContent["+index+"].content = this.value;");newContent.find("#formatType-1-often").attr("id","formatType-"+index+"-often");
				newContent.find("#formatType-1-title").attr("id","formatType-"+index+"-title");
				newContent.find("#formatType-1-content").attr("id","formatType-"+index+"-content");
				$(".A-formatType-content .tab-content").append(newContent);


				//SP limit 2
				index == 1 ? "" : $(".plus-formart-type").remove();

			},
			reset : function() {
				$(".tab-formatType").remove();
				$(".tab-pane-formatType").remove();
				this.tabCount = 0;
				delete this.listContent;
				this.listContent = {};

				//SP limit 2
				$(".plus-formart-type").length == 0 ? $(".A-formatType-content").find("ul.nav").append(this.core.plus.clone()):"";

				this.add();
			},
			remove : function(index) {
				$("#tab-formatType-"+index).remove();
				$("#tab-pane-formatType-"+index).remove();
				var tempListContent = {};
				for( var k in this.listContent )
				{
					if( k != index )
					{
						tempListContent[k] = this.listContent[k];
					}
				}
				delete this.listContent;
				this.listContent = {};
				this.listContent = tempListContent;
				this.tabCount--;

				//SP limit 2
				$(".A-formatType-content").find("ul.nav").append(this.core.plus.clone());
				setTimeout(function(){
					$("#tab-formatType-1 > a").eq(0).click();
				},500);
			}
		};

		var formatTypeTable = {
			core : false,
			typeList : false,
			columnSize : 1,
			formatTypeScript : [],
			init : function() {
				this.core = $("#formatType-sample-table").clone().show();
				$("#formatType-sample-table").remove();
				this.core.attr("id","formatType-mapping-table");

				this.typeList = {};
				for( var k in data_stock )
				{
					this.typeList[k] = data_stock[k].formatType;
				}
			},
			fillDB : function() {
				$("#formatType-mapping-table").remove();
				var newformartTypeTable = this.core.clone();
				var content = "<tr>";
				var TitleColumn = "";
				var ContentColumn = "";
				this.columnSize = parseInt(data_stock[0].formatTypeTitle[0].columnSize);
				for( var k in data_stock )
				{
					TitleColumn+= "<th colspan='2' class=\"text-center\">"+data_stock[k].formatType+"</th>";
					ContentColumn+= "<td><input placeholder='庫存數量' class=\"form-control\" value=\""+data_stock[k].value+"\" onkeyup=\"saveTempFormartTypeA('"+this.typeList[k]+"',this.value);\" /></td>";
					ContentColumn+= "<td><input placeholder='低庫存警告數量' class=\"form-control\" value=\""+data_stock[k].warnValue+"\" onkeyup=\"saveTempFormartTypeB('"+this.typeList[k]+"',this.value);\" /></td>";

					if ( (parseInt(k)+1) % this.columnSize == 0 )
					{
						content+= '</tr><tr >' + TitleColumn + '</tr><tr>' + ContentColumn;
						TitleColumn = "";
						ContentColumn = "";
					}
					if( k == this.typeList.length - 1 )
					{
						content+= '</tr><tr >' + TitleColumn + '</tr><tr>' + ContentColumn;
						TitleColumn = "";
						ContentColumn = "";
					}
				}
				content+="</tr>";

				//newformartTypeTable.find("table > thead").append(TitleColumn);
				newformartTypeTable.find("table > tbody").append(content);
				newformartTypeTable.find(".panel-title").html("<span class=\"glyphicons glyphicons-table\"></span>規格庫存對應表");

				$(".product-stock-panel-body").append(newformartTypeTable);
			},
			refresh : function() {
				$("#formatType-mapping-table").remove();

				var newformartTypeTable = this.core.clone();
				var content = "<tr >";
				var TitleColumn = "";
				var ContentColumn = "";

				var new_data_stock = [];
				for(var k in this.typeList)
				{
					TitleColumn+= "<th colspan='2' class=\"text-center\">"+this.typeList[k]+"</th>";
					ContentColumn+= "<td><input placeholder='庫存數量' class=\"form-control\" value=\"0\" onkeyup=\"saveTempFormartTypeA('"+this.typeList[k]+"',this.value);\" /></td>";
                    ContentColumn+= "<td><input placeholder='低庫存警告數量' class=\"form-control\" value=\"\" onkeyup=\"saveTempFormartTypeB('"+this.typeList[k]+"',this.value);\" /></td>";

					if ( (parseInt(k)+1) % this.columnSize == 0 )
					{
						content+= '</tr><tr >' + TitleColumn + '</tr><tr>' + ContentColumn;
						TitleColumn = "";
						ContentColumn = "";
					}
					if( k == this.typeList.length - 1 )
					{
						content+= '</tr><tr>' + TitleColumn + '</tr><tr>' + ContentColumn;
						TitleColumn = "";
						ContentColumn = "";
					}
					if( typeof(data_stock[k]) == "undefined" )
					{
						data_stock[k] = $.extend( true, {}, data_stock[0] );
						data_stock[k].id = -1;
						data_stock[k].formatType = this.typeList[k];
						data_stock[k].formatTypeTitle = this.formatTypeScript;
						data_stock[k].value = 0;
					}
					else
					{
						data_stock[k].formatType = this.typeList[k];
						data_stock[k].formatTypeTitle = this.formatTypeScript;
						data_stock[k].value = 0;
					}
					new_data_stock[k] = data_stock[k];
				}
				delete data_stock;
				data_stock = [];
				data_stock = new_data_stock;
				content+="</tr>";

				//newformartTypeTable.find("table > thead").append(TitleColumn);
				newformartTypeTable.find("table > tbody").append(content);
				newformartTypeTable.find(".panel-title").html("<span class=\"glyphicons glyphicons-table\"></span>規格庫存對應表");

				$(".product-stock-panel-body").append(newformartTypeTable);
			},
			apply : function() {
				delete this.typeList;
				this.typeList = false;
				formatTypeContent.reload();
				if( formatTypeContent.tabCount == 1 )
				{
					var formatTypeList = formatTypeContent.listContent[1];
					var title = formatTypeList.title;
					var content = formatTypeList.content;

					if( title != null
						&& content != null
						&& title.length > 0
						&& content.length > 0
					)
					{
						var arr_typeList = content.split('/');
						this.typeList = arr_typeList;
						this.columnSize = arr_typeList.length;
						this.formatTypeScript[0] = {
							title : title,
							content : content,
							columnSize : arr_typeList.length
						};
						this.refresh();
						return true;
					}
					else
					{
						alert("請輸入[規格名稱]與[參考規格]！");
						return false;
					}
				}
				if( formatTypeContent.tabCount == 2 )
				{
					var formatTypeList_levelA = formatTypeContent.listContent[1];
					var formatTypeList_levelB = formatTypeContent.listContent[2];
					var title_A = formatTypeList_levelA.title;
					var content_A = formatTypeList_levelA.content;
					var title_B = formatTypeList_levelB.title;
					var content_B = formatTypeList_levelB.content;
					if( title_A != null
						&& content_A != null
						&& title_A.length > 0
						&& content_A.length > 0
						&& title_B != null
						&& content_B != null
						&& title_B.length > 0
						&& content_B.length > 0
					)
					{

						var arr_typeListA = content_A.split('/');
						var arr_typeListB = content_B.split('/');
						var arr_typeList = {};
						var cnt = 0;

						this.columnSize = arr_typeListB.length;

						this.formatTypeScript[0] = {
							title : title_A,
							content : content_A,
							columnSize : this.columnSize
						};
						this.formatTypeScript[1] = {
							title : title_B,
							content : content_B,
							columnSize : this.columnSize
						};
						for( var k in arr_typeListA )
						{
							for( var j in arr_typeListB )
							{
								arr_typeList[cnt] = arr_typeListA[k].trim()+'-'+arr_typeListB[j].trim();
								cnt++;
							}
						}
						this.typeList = arr_typeList;
						this.refresh();
						return true;
					}
					else
					{
						alert("請輸入[規格名稱]與[參考規格]！");
						return false;
					}

				}
			}


		};

		function resetFormatType(inds)
		{
			$("#tab-formatType-"+inds).find(".form-group").show();
			$("#formatType-"+inds+"-table").remove();

			var temp_data_stock = {};
			temp_data_stock[0] = $.extend( true, {}, data_stock[0] );
			delete data_stock;
			data_stock = {};
			data_stock = temp_data_stock;
		}

		function saveTempFormartTypeA(formatType,qty)
		{
			for( var k in data_stock )
			{
				if( data_stock[k].formatType == formatType )
				{
					data_stock[k].value = qty;
				}
			}
		}

		function saveTempFormartTypeB(formatType,qty)
		{
			for( var k in data_stock )
			{
				if( data_stock[k].formatType == formatType )
				{
					data_stock[k].warnValue = qty;
				}
			}
		}

		function addToOften(self)
		{
		}

		function init_MainLangCodeSwitch()
		{
			$(".main-langCode li a").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(e){
					$(".main-langCode li").removeClass("active");
					$(this).parent().addClass("active");
					$(".main-tab-content").fadeOut(500);
					var langCode = $(this).attr("data-langCode");

					setTimeout(function(){
						loadTempData();
						$(".main-tab-content").fadeIn(500);
					},500);

				});
			});

			$('.main-langCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
				var langCode 	= $(this).attr("data-langCode");
			});

			$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				var langCode 	= $(this).attr("data-langCode");
			});
		}

		function loadTempData()
		{
			var lang   = $(".main-langCode li.active a").attr("data-langCode");

			var detail = data_detail[lang];
			$("#product-name").val(detail['name']);
			$("#product-image").attr("src",detail['src']);
			$(".product-img-container .btn-img-alt").html(detail['alt']);

			( typeof(detail['value']) == "undefined" || detail['value'] == null ) ? detail['value'] = {} : "";

			$("#cTitle1").val(detail.value.title);
			var desc = (typeof(detail['value']['description']) == "undefined")?"":detail['value']['description'];
			CKEDITOR.instances.ckeditor1.setData(desc);

			var title2 = (typeof(detail['value']['section']) == "undefined")?"商品特色":detail['value']['section'][0]["title"];
			var desc2 = (typeof(detail['value']['section']) == "undefined")?"":detail['value']['section'][0]["content"];
			$("#cTitle2").val(title2);
			CKEDITOR.instances.ckeditor2.setData(desc2);
			var title3 = (typeof(detail['value']['section']) == "undefined")?"如何使用":detail['value']['section'][1]["title"];
			var desc3 = (typeof(detail['value']['section']) == "undefined")?"":detail['value']['section'][1]["content"];
			$("#cTitle3").val(title3);
			var title4 = (typeof(detail['value']['section']) == "undefined")?"影片介紹":detail['value']['section'][2]["title"];
			CKEDITOR.instances.ckeditor3.setData(desc3);
			var desc4 = (typeof(detail['value']['section']) == "undefined")?"":detail['value']['section'][2]["content"];
			$("#cTitle4").val(title4);
			CKEDITOR.instances.ckeditor4.setData(desc4);
			var title5 = (typeof(detail['value']['section']) == "undefined")?"退/換貨或須知":detail['value']['section'][3]["title"];
			var desc5 = (typeof(detail['value']['section']) == "undefined")?"":detail['value']['section'][3]["content"];
			$("#cTitle5").val(title5);
			CKEDITOR.instances.ckeditor5.setData(desc5);

			$(".product-image-slider-container").empty();
			for( var k in data_detail[lang].value.image )
			{
				var file = data_detail[lang].value.image[k];
				var alt  = (typeof(file.alt) == "undefined")?"":file.alt;
				var newImg = '<div class="img-container">' +
					'<img class="img-thumbnail" style="height:100px;" src="' + file.url + '">' +
					'<div class="btn btn-xs btn-img-alt">'+alt+'</div>' +
					'<div class="btn-group btn-tools">' +
						'<div class="btn btn-warning btn-xs btn-edit-img-alt" onclick="sliderImageALT(\'' + file.url + '\',this);"><span class="glyphicons glyphicons-pencil"></span></div>' +
						'<div class="btn btn-danger btn-xs btn-img-remove" onclick="sliderImageRemove(\'' + file.url + '\',this);"><span class="glyphicons glyphicons-remove"></span></div>' +
					'</div>' +
				'</div>';
				$(".product-image-slider-container").append(newImg);
			}
		}
		function loadTempCurrencyData()
		{
			var currency = $(".main-isoCode li.active a").attr("data-isocode");
			var term = data_price[currency].term;

			$("#product-price-term option[value='"+term+"']").attr("selected",true);
			$("#product-price-term option[value='"+term+"']").prop("selected",true);

			( term == "forever" )?$(".product-term-soff-block").fadeOut():$(".product-term-soff-block").fadeIn();

			$('#daterangepicker1').data('daterangepicker').setStartDate(data_price[currency].begin);
			$('#daterangepicker1').data('daterangepicker').setEndDate(data_price[currency].end);

			$("#product-price-normal").val(data_price[currency].normal);
			$("#product-price-sell").val(data_price[currency].value);
		}

		function saveMainKey(self)
		{
			var newKey = $(self).val();
			data_product.detailKey = newKey;
			data_product.priceKey  = newKey;
			data_product.stockKey  = newKey;

			var currency = $(".main-isoCode li.active a").attr("data-isocode");
			var lang	 = $(".main-langCode li.active a").attr("data-langCode");

			for( var k in data_detail )
			{
				data_detail[k].detailKey = newKey;
			}
			for( var k in data_price )
			{
				data_price[k].priceKey = newKey;
			}

			for( var k in data_stock )
			{
				data_stock[k].stockKey = newKey;
			}
			mainKeyisChange = (newKey == old_mainKey)?false:true;
		}

		function saveTempProductData(key, self)
		{
			data_product[key] = $(self).val();
		}

		function saveTempDetailData(key, self)
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			data_detail[lang][key] = $(self).val();
		}

		function saveTempDetailValue(key1,key2,key3,self)
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");

			typeof(data_detail[lang].value) == "undefined" || data_detail[lang].value == "" ? data_detail[lang].value = {} : "";
			typeof(data_detail[lang].value.section) == "undefined" ? data_detail[lang].value.section = templateProductSection : "";

			if( key1 !== false && key2 === false && key3 ===  false )
			{
				data_detail[lang].value[key1] = $(self).val();
			}
			else if ( key1 !== false && key2 !== false && key3 ===  false )
			{
				data_detail[lang].value[key1][key2] = $(self).val();
			}
			else if ( key1 !== false && key2 !== false && key3 !==  false )
			{
				data_detail[lang].value[key1][key2][key3] = $(self).val();
			}
		}

		function saveTempPriceData(key,self)
		{
			var currency = $(".main-isoCode li.active a").attr("data-isocode");
			data_price[currency][key] = $(self).val();
		}

		function priceTermChange(self)
		{
			var term = $(self).val();
			var currency = $(".main-isoCode li.active a").attr("data-isocode");
			data_price[currency].term = term;
			( term == "forever" )?$(".product-term-soff-block").fadeOut():$(".product-term-soff-block").fadeIn();
		}

		function init_datePicker()
		{
			$('#daterangepicker1').daterangepicker({
			   format: "YYYY-MM-DD HH:mm:ss"
			});
			$('#daterangepicker1').on('apply.daterangepicker', function(ev, picker) {
				var currency = $(".main-isoCode li.active a").attr("data-isocode");
				data_price[currency]['begin'] = picker.startDate.format('YYYY-MM-DD HH:mm:ss');
				data_price[currency]['end']   = picker.endDate.format('YYYY-MM-DD HH:mm:ss');
			});
		}

		/* 產品主圖 */
		function selectMediaStack()
		{
			MediaStack.popup({
				basePath : "/uploads/members/",
				selectActionFunction : function(e){
					var file = MediaStack.convertFileObject(e);
					$("#product-image").attr("src",file.url);
					var lang = $(".main-langCode li.active a").attr("data-langCode");
					data_detail[lang].src = file.url;
				}
			});
		}
		function productImageALT()
		{
			var alt = prompt('請輸入產品圖描述：','');
			if( alt != null )
			{
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				$(".product-img-container .btn-img-alt").html(alt);
				data_detail[lang].alt = alt;
			}
		}

		/* 產品輪播圖 */
		function selectMediaStackSlider()
		{
			MediaStack.popup({
				basePath : "/uploads/members/",
				selectActionFunction : function(e){
					var file = MediaStack.convertFileObject(e);
					var newImg = '<div class="img-container">' +
						'<img class="img-thumbnail" style="height:100px;" src="' + file.url + '">' +
						'<div class="btn btn-xs btn-img-alt"></div>' +
						'<div class="btn-group btn-tools">' +
							'<div class="btn btn-warning btn-xs btn-edit-img-alt" onclick="sliderImageALT(\'' + file.url + '\',this);"><span class="glyphicons glyphicons-pencil"></span></div>' +
							'<div class="btn btn-danger btn-xs btn-img-remove" onclick="sliderImageRemove(\'' + file.url + '\',this);"><span class="glyphicons glyphicons-remove"></span></div>' +
						'</div>' +
					'</div>';
					$(".product-image-slider-container").append(newImg);
					var lang = $(".main-langCode li.active a").attr("data-langCode");
					if ( typeof(data_detail[lang].value) == "undefined" || data_detail[lang].value == null || data_detail[lang].value == "" ){
						//data_detail[lang].value = new Object();
						data_detail[lang].value = {} ;
					}
					( typeof(data_detail[lang].value.image) == "undefined" ) ? data_detail[lang].value.image = [] : "";
					data_detail[lang].value.image.push(file);
				}
			});
		}
		function sliderImageALT(url, self)
		{
			var alt = prompt('請輸入內頁輪播描述：','');
			if( alt != null )
			{
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				for( var k in data_detail[lang].value.image )
				{
					if( data_detail[lang].value.image[k].url == url )
					{
						data_detail[lang].value.image[k].alt = alt;
						$(self).parent().parent().find(".btn-img-alt").html(alt);
						break;
					}
				}
			}
		}
		function sliderImageRemove(url, self)
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			$(self).parent().parent().remove();
			var newImage = [];
			for( var k in data_detail[lang].value.image )
			{
				if( data_detail[lang].value.image[k].url != url )
				{
					newImage.push(data_detail[lang].value.image[k]);
				}
			}
			delete data_detail[lang].value.image;
			data_detail[lang].value.image = [];
			data_detail[lang].value.image = newImage;
		}


        jQuery(document).ready(function() {

            // Init Theme Core
            Core.init();

            // Init Theme Core
            Demo.init();

			init_datePicker();

			init_MainIsoCode();

			init_MainLangCodeSwitch();


            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent1 = CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
            var editorContent2 = CKEDITOR.replace('ckeditor2', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
            var editorContent3 = CKEDITOR.replace('ckeditor3', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
            var editorContent4 = CKEDITOR.replace('ckeditor4', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
            var editorContent5 = CKEDITOR.replace('ckeditor5', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					var id = $(this).attr("id");
					var lang = $(".main-langCode li.active a").attr("data-langCode");

					typeof(data_detail[lang].value) == "undefined" || data_detail[lang].value == "" ? data_detail[lang].value = {} : "";
					typeof(data_detail[lang].value.section) == "undefined" ? data_detail[lang].value.section = $.extend(true, [], templateProductSection) : "";

					for( var k in data_detail[lang].value.section)
					{
						typeof(data_detail[lang].value.section[k].title) == "undefined" ? data_detail[lang].value.section[k] = $.extend(true, {}, templateProductSection[k]) : "";
					}

					if( id == "cke_1" )
					{
						data_detail[lang].value.description = evt.editor.getData();
					}
					if( id == "cke_2" )
					{
						data_detail[lang].value.section[0].content = evt.editor.getData();

					}
					if( id == "cke_3" )
					{
						data_detail[lang].value.section[1].content = evt.editor.getData();
					}
					if( id == "cke_4" )
					{
						data_detail[lang].value.section[2].content = evt.editor.getData();
					}
					if( id == "cke_5" )
					{
						data_detail[lang].value.section[3].content = evt.editor.getData();
					}
				});
			}
            // Turn off automatic editor initilization.
            // Used to prevent conflictions with multiple text
            // editors being displayed on the same page.
			/*
			$("input[type=radio]").switchButton({
				on_label: '顯示',
				off_label: '隱藏',
				width: 50,
				height: 16,
				button_width: 25
			});
			*/
        });

	function checkMainKeyExist()
	{
		var isExistRS = $.ajax({
			url: "<?php echo base_url('/admin/product/isMainKeyExist');?>",
			async:false, cache:false, method:"GET", data:{ 'pkey':$("#product-key").val() }
		});
		return isExistRS.responseJSON.resp;
	}


	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();

			var newKey = $("#product-key").val();
			if( newKey.trim().length == 0 )
			{
				PM.show({title: "欄位錯誤",text: '[SEO 網址搜索名稱] 不得為空白！',type: "danger"});
				return false;
			}
			var regex = /^[0-9a-zA-Z]{1,50}$/g;
			if( regex.test(newKey) == false )
			{
				PM.show({title: "欄位錯誤",text: '[SEO 網址搜索名稱] 有誤！僅能在1~50個字元內，大小寫英數字組合！',type: "danger"});
				return false;
			}

			var l = Ladda.create(this);
			l.start();

			if( mainKeyisChange === true )
			{
				var isExistRS = checkMainKeyExist();
				if( isExistRS == true )
				{
					PM.show({ title: "欄位錯誤", text: '[SEO 網址搜索名稱] 僅用英數字命名，不可重複，不可使用非法字元！', type: "danger" });
					l.stop();
					return false;
				}
			}

//TODO
			var ajaxData = {
				'data_product': data_product,
				'data_detail' : data_detail,
				'data_price'  : data_price,
				'data_stock'  : data_stock
			};
			( isNew == "T" )?ajaxData['isNew']=true:'';

			$.ajax({
				url: "<?php echo base_url('/admin/product/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:ajaxData,
				success:function(data, status, xhr){
					l.stop();
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";

					PM.show({ title: data.message, text: text, type: type });

					setTimeout(function(){
						location.href = "/admin/product/listTable";
					},1000);
				},
				error:function(xhr, stauts, err){
					l.stop();
					PM.erro();
				}
			}).always(function() { l.stop(); });
			return false;
		});
	}

	function activeMark()
	{
		$(".fancytree-title").each(function(){
			if( $(this).text() == currentProductTitle )
			{
				$(this).parent().find(".fancytree-icon").css({"background-position":"-80px -160px"});
			}
		});
	}

	function moveParentId(hitMode,target,self)
	{
		var postData = { "id" : self.id, "parentId" : -1 };
		if( hitMode == "before" )
		{
			postData.parentId = target.parentId;
		}
		else if( hitMode == "over" || hitMode == "after" )
		{
			postData.parentId = target.id;
		}
		if( postData.parentId != -1 )
		{
			data_product.parentId = postData.parentId;//$(self).val();
		}
	}

	function init_fancytree()
	{
		$("#tree6").fancytree({
            extensions: ["dnd", "edit"],
            // titlesTabbable: true,
            selectMode : 3,
            checkbox: true,
            source: fancytree,
            select: function(event, data) {
                // Display list of selected nodes
                var selNodes = data.tree.getSelectedNodes();
                // convert to title/key array
                var selKeys = $.map(selNodes, function(node){
                     return node.key;
                  });
                //$("#echoSelection2").text(selKeys.join(","));
                $("#parendId").val(selKeys.join(","));
				data_product.parentId = selKeys.join(",");
              },
            dnd: {
                autoExpandMS: 400,
                focusOnClick: true,
                preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
                preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
                dragStart: function(node, data) {
                    /** This function MUST be defined to enable dragging for the tree.
                     *  Return false to cancel dragging of node.
                     */

					var canDrag = ( typeof(node.data.draggable) == "undefined" ) ? false : node.data.draggable;
                    return canDrag;
                },
				dragStop: function(node, data) {
					activeMark();
				},
                dragEnter: function(node, data) {
                    /** data.otherNode may be null for non-fancytree droppables.
                     *  Return false to disallow dropping on node. In this case
                     *  dragOver and dragLeave are not called.
                     *  Return 'over', 'before, or 'after' to force a hitMode.
                     *  Return ['before', 'after'] to restrict available hitModes.
                     *  Any other return value will calc the hitMode from the cursor position.
                     */
                    // Prevent dropping a parent below another parent (only sort
                    // nodes under the same parent)
                    /*        if(node.parent !== data.otherNode.parent){
								return false;
							  }
							  // Don't allow dropping *over* a node (would create a child)
							  return ["before", "after"];
					*/
					var canDrag = ( typeof(node.data.droppable) == "undefined" ) ? false : node.data.droppable;
                    return canDrag;
                },
                dragDrop: function(node, data) {
                    /** This function MUST be defined to enable dropping of items on
                     *  the tree.
                     */
                    data.otherNode.moveTo(node, data.hitMode);
					moveParentId(data.hitMode,data.node.data,data.otherNode.data);
                }
            },
            activate: function(event, data) {
                //alert("activate " + data.node);
            }
        });
		activeMark();
	}

	<?php $jsIsNew = ( $isNew ) ? "T" : "F"; ?>
	var isNew = '<?php echo $jsIsNew;?>';
	var tree = false;
	var currentProductTitle= "<?php echo $currentProductTitle;?>";
	var fancytree = <?php echo json_encode($fancyTree);?>;
	$(function(){
      init_pagesave();
	  $("#tree6desp").hide();
      init_fancytree();
      $(".checkType").click(function(){
          var val = $(this).val();

          if($(this).prop("checked")){
            data_product['type_'+val] = $(this).val();
          }else{
            data_product['type_'+val] = '';
          }
      })


	});
	</script>

</body>
</html>