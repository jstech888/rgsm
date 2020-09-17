
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.mn-title {
  height: 30px;
}
.mn {
	margin-top: 15px !important;
}
#invoice-item .mn,
#invoice-item address,
#invoice-item td {
  font-size: medium;
}
#invoice-item .panel-title,
#invoice-item th {
  font-size: large;
}
.form-group {
    margin-bottom: 0px;
}
.shiftDown {
    position: relative;
    top: 12px;
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
                            <a>Resume Manage</a>
                        </li>
                        <li class="crumb-active">
							<a>Personal Information</a>
						</li>
                    </ol>
                </div>
                <div class="topbar-right">
					<!-- <input type="radio" name="show" class="widget-isShow" checked> -->
                </div>
            </header>
            <!-- End: Topbar -->
			

            <!-- Begin: Content -->
            <section id="content" class="">

                <div class="panel invoice-panel">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> Personal Information </span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputName" class="col-lg-3 control-label"> Fullname </label>
								<div class="col-lg-8 shiftDown" >
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["fullname"];?></p>
								</div>
							</div>
							<div class="form-group">
								<label for="inputMail" class="col-lg-3 control-label">Nickname</label>
								<div class="col-lg-8 shiftDown">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["nickname"];?></p>
								</div>
							</div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Gender</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['gender'][$selfData["gender"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
								<label for="inputMail" class="col-lg-3 control-label">Birthday</label>
								<div class="col-lg-8 shiftDown">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["birthday"];?></p>
								</div>
							</div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Mobile Phone</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $selfData["mobile"];?></p>
                                </div>
                            </div>
							<div class="form-group">
								<label for="input-nickname" class="col-lg-3 control-label">Address</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $selfData["address"];?></p>
                                </div>
							</div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Nationality</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['nationality'][$selfData["nationality"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Has ID Card ? </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php
                                        $hasIdCard_Array = explode("!@#$", $selfData["hasIdCard"]);
                                        foreach ($hasIdCard_Array as $hasIdCardIdx) {
                                            $hasIdCard_Array2[] = $personalInfo['hasIdCard'][$hasIdCardIdx];
                                        }
                                        echo implode(" , ", $hasIdCard_Array2);
                                    ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Education</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['education'][$selfData["education"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Study Status</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['study_status'][$selfData["study_status"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Military Service Status</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['military_service_status'][$selfData["military_service_status"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Disability Status</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['disability_status'][$selfData["disability_status"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Pipeline</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['pipeline'][$selfData["pipeline"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Language </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                    <?php
                                        $language_Array = explode("!@#$", $selfData["language"]);
                                        foreach ($language_Array as $language) {
                                            $language_Array2[] = $personalInfo['language'][$language];
                                        }
                                        echo implode(" , ", $language_Array2);
                                    ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label">Skill Level</label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted"><?php echo $personalInfo['skill_level'][$selfData["skill_level"]];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Design Skills </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <?php
                                        $design_skills_Array = explode("!@#$", $selfData["design_skills"]);
                                        foreach ($design_skills_Array as $design_skills) {
                                            $design_skills_Array2[] = $personalInfo['design_skills'][$design_skills];
                                        }
                                        echo implode(" , ", $design_skills_Array2);
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Develope Skills </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <?php
                                        $develope_skills_Array = explode("!@#$", $selfData["develope_skills"]);
                                        foreach ($develope_skills_Array as $develope_skills) {
                                            $develope_skills_Array2[] = $personalInfo['develope_skills'][$develope_skills];
                                        }
                                        echo implode(" , ", $develope_skills_Array2);
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Interest Industry </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <?php
                                        $interest_industry_Array = explode("!@#$", $selfData["interest_industry"]);
                                        foreach ($interest_industry_Array as $interest_industry) {
                                            $interest_industry_Array2[] = $personalInfo['interest_industry'][$interest_industry];
                                        }
                                        echo implode(" , ", $interest_industry_Array2);
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Department </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <?php
                                        $department_Array = explode("!@#$", $selfData["department"]);
                                        foreach ($department_Array as $department) {
                                            $department_Array2[] = $personalInfo['department'][$department];
                                        }
                                        echo implode(" , ", $department_Array2);
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Job Application </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <?php
                                        $job_application_Array = explode("!@#$", $selfData["job_application"]);
                                        foreach ($job_application_Array as $job_application) {
                                            $job_application_Array2[] = $personalInfo['job_application'][$job_application];
                                        }
                                        echo implode(" , ", $job_application_Array2);
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <?php
                                $uploadfiles = $selfData["uploadfiles"];
                                $uploadfiles_json = json_decode($uploadfiles);
                            ?>

                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> English graduation certificate </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <a href="<?php echo $selfData["path"];?>/<?php echo $uploadfiles_json->file01 ;?>" target="_blank"> <?php echo $uploadfiles_json->file01 ;?> </a>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> Resume </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <a href="<?php echo $selfData["path"];?>/<?php echo $uploadfiles_json->file02 ;?>" target="_blank"> <?php echo $uploadfiles_json->file02 ;?> </a>
                                    </p>
                                </div>
                            </div>

                            <?php if($uploadfiles_json->file03!='') { ?>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> License #01 </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <a href="<?php echo $selfData["path"];?>/<?php echo $uploadfiles_json->file03 ;?>" target="_blank"> <?php echo $uploadfiles_json->file03 ;?> </a>
                                    </p>
                                </div>
                            </div>
                        	<?php } ?>

                        	<?php if($uploadfiles_json->file04!='') { ?>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> License #01 </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <a href="<?php echo $selfData["path"];?>/<?php echo $uploadfiles_json->file04 ;?>" target="_blank"> <?php echo $uploadfiles_json->file04 ;?> </a>
                                    </p>
                                </div>
                            </div>
                        	<?php } ?>

                        	<?php if($uploadfiles_json->file05!='') { ?>
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-3 control-label"> License #01 </label>
                                <div class="col-lg-8 shiftDown">
                                    <p id="inputName" class="form-control-static text-muted">
                                        <a href="<?php echo $selfData["path"];?>/<?php echo $uploadfiles_json->file05 ;?>" target="_blank"> <?php echo $uploadfiles_json->file05 ;?> </a>
                                    </p>
                                </div>
                            </div>
                        	<?php } ?>

							<div class="form-group">
								<label for="input-nickname" class="col-lg-3 control-label">Status</label>
								<div class="col-lg-8 shiftDown">
                                    <select class="form-control" onchange="changeResumeStatus('<?php echo $selfData["id"];?>', this);"><?php
                                        foreach( $FlagSelOpt AS $k=>$opt )
                                        {
                                            $isSelected = ( $selfData["status"] == $k ) ? "selected" : "";
                                            echo "<option value=\"".$k."\" ".$isSelected.">".$opt["title"]."</option>";
                                        }
                                        ?>
                                    </select>
									<span class="help-block mt5"></span>
								</div>
							</div>

							
                            <div class="form-group">
								<div class="col-lg-12">
									<div class="btn-group pull-right">
										<?php /* <a class="btn btn-info" onclick="pageSave();"> Save </a> */ ?>
										<a class="btn btn-default" onclick="location.href = '/admin/user/listResume';"> Back </a>
									</div>
								</div>
							</div>

						</form>
                    </div>
                </div>

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
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>
	
    <!-- Datatables -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

    <!-- Datatables Editor addon - READ LICENSING NOT MIT  -->
	<script src="/libs/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
	

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
    <script type="text/javascript">
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

        });
    </script>
    
	<script type="text/javascript">
	var selfData = <?php echo json_encode($selfData);?>;
	
	$(function(){
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
	});
	
	function pageSave()
	{
        var ajaxData = { 
			"saveData" : selfData 
		};
		$.ajax({
			url: "/admin/user/saveInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				new PNotify({ title: "會員管理", text: '修改完成！', shadow: true, opacity: "0.75", type: "info",
					stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 1400
				});
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				new PNotify({ title: "問題類型",text: '修改失敗！', shadow: true, opacity: "0.75", type: "danger",
					stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 1400
				});
				setTimeout(function(){
					location.reload();
				},500);
			}
		});
	}
	
	function saveTempData( key, self )
	{
		selfData[key] = $(self).val();
	}

    function changeResumeStatus(id, self)
    {
        var ajaxData = {
            "saveData" : {
                "id"   : id,
                "status" : $(self).val()
            }
        };
        $.ajax({
            url: "/admin/user/changeResumeStatus",
            async:true,
            cache:false,
            method:"POST",
            data:ajaxData,
            success:function(data, status, xhr){
                PM.show({ title: "Resume Manage", text: 'Success！', type: "info" });
                setTimeout(function(){
                    location.reload();
                },500);
            },
            error:function(xhr, stauts, err){ PM.erro(); }
        });
    }
	</script>
	
</body>
</html>