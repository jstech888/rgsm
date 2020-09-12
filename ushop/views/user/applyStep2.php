<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Personal Information</h1>
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</header>
<!-- end of ex-header -->
<!-- end of header -->

<!-- Breadcrumbs -->
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs list-unstyled list-inline">
                    <li class="list-inline-item"><a class="underline" href="index.html">Home</a></li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item">Personal Information</li>
                </ul>
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</div>
<!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->

<!-- Content -->
<div class="form-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Standard Form -->
                <form id="StandardForm" data-toggle="validator" data-focus="false" data-disable="false" method="post" action="/user/add_resume_step2" target="actFrame" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $resumeid;?>" />
                    <div class="form-group">
                        <label class="col-sm-12" for="csex">語言</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language01" name="language[]" value="1">
                                <label class="form-check-label">
                                    台語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language02" name="language[]" value="2">
                                <label class="form-check-label">
                                    英文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language03" name="language[]" value="3">
                                <label class="form-check-label">
                                    德文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language04" name="language[]" value="4">
                                <label class="form-check-label">
                                    俄文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language05" name="language[]" value="5">
                                <label class="form-check-label">
                                    義大利文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language06" name="language[]" value="6">
                                <label class="form-check-label">
                                    葡萄牙文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language07" name="language[]" value="7">
                                <label class="form-check-label">
                                    阿拉伯文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language08" name="language[]" value="8">
                                <label class="form-check-label">
                                    法文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language09" name="language[]" value="9">
                                <label class="form-check-label">
                                    西班牙文
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language10" name="language[]" value="10">
                                <label class="form-check-label">
                                    印尼語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language11" name="language[]" value="11">
                                <label class="form-check-label">
                                    馬來語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language12" name="language[]" value="12">
                                <label class="form-check-label">
                                    粵語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language13" name="language[]" value="13">
                                <label class="form-check-label">
                                    越語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language14" name="language[]" value="14">
                                <label class="form-check-label">
                                    印度語
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="language15" name="language[]" value="15">
                                <label class="form-check-label">
                                    日文
                            </div>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="csex">精通等級</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="skill_level01" name="skill_level" value="1">
                                <label class="form-check-label">精通</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="skill_level02" name="skill_level" value="2">
                                <label class="form-check-label">中等</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="skill_level03" name="skill_level" value="3">
                                <label class="form-check-label">略懂</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="skill_level04" name="skill_level" value="4">
                                <label class="form-check-label">不會
                            </div>
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cnationality">設計技能</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills01" name="design_skills[]" value="1">
                                <label class="form-check-label">Sketch</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills02" name="design_skills[]" value="2">
                                <label class="form-check-label">InVision</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills03" name="design_skills[]" value="3">
                                <label class="form-check-label">Figma</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills04" name="design_skills[]" value="4">
                                <label class="form-check-label">Photoshop</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills05" name="design_skills[]" value="5">
                                <label class="form-check-label">PhotoImpact</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills06" name="design_skills[]" value="6">
                                <label class="form-check-label">AutoCAD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills07" name="design_skills[]" value="7">
                                <label class="form-check-label">Maya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills08" name="design_skills[]" value="8">
                                <label class="form-check-label">Scrum</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="design_skills09" name="design_skills[]" value="9">
                                <label class="form-check-label">Others
                            </div>
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cnationality">開發技能</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="1">
                                <label class="form-check-label">C++</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="2">
                                <label class="form-check-label">C#</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="3">
                                <label class="form-check-label">ASP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="4">
                                <label class="form-check-label">PHP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="5">
                                <label class="form-check-label">JSP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="6">
                                <label class="form-check-label">ASP.NET</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="7">
                                <label class="form-check-label">ASP.NET Core</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="8">
                                <label class="form-check-label">Java</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="9">
                                <label class="form-check-label">Node.js
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="10">
                                <label class="form-check-label">Python
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="11">
                                <label class="form-check-label">Go
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="12">
                                <label class="form-check-label">AWS Cloud
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="13">
                                <label class="form-check-label">GCP Cloud
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="14">
                                <label class="form-check-label">Windows
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="15">
                                <label class="form-check-label">Linux
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="16">
                                <label class="form-check-label">Azure
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="17">
                                <label class="form-check-label">Ali Cloud
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="18">
                                <label class="form-check-label">Docker
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="19">
                                <label class="form-check-label">kubernetes
                            </div>
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="20">
                                <label class="form-check-label">MySQL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="21">
                                <label class="form-check-label">MSSQL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="22">
                                <label class="form-check-label">SqlLite</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="23">
                                <label class="form-check-label">Oracle</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="24">
                                <label class="form-check-label">Firebase</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="25">
                                <label class="form-check-label">MongoDB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="26">
                                <label class="form-check-label">Cassandra</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="27">
                                <label class="form-check-label">GraphQL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="28">
                                <label class="form-check-label">Machine Learning</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="29">
                                <label class="form-check-label">React</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="30">
                                <label class="form-check-label">Angular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="31">
                                <label class="form-check-label">PostgreSQL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="32">
                                <label class="form-check-label">CouchDB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="33">
                                <label class="form-check-label">ES6</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="34">
                                <label class="form-check-label">ES5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="35">
                                <label class="form-check-label">Symfony(PHP)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="36">
                                <label class="form-check-label">Laravel(PHP)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="37">
                                <label class="form-check-label">DJango</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="develope_skills01" name="develope_skills[]" value="38">
                                <label class="form-check-label">Others</label>
                            </div>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="csex">興趣產業</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="1">
                                <label class="form-check-label">媒體和互聯網</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="2">
                                <label class="form-check-label">傳產製造業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="3">
                                <label class="form-check-label">公共服務供應</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="4">
                                <label class="form-check-label">資訊科技業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="5">
                                <label class="form-check-label">精密技工</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="6">
                                <label class="form-check-label">人力資源跟企劃</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="7">
                                <label class="form-check-label">資訊科技業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="8">
                                <label class="form-check-label">精密技工</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="9">
                                <label class="form-check-label">人力資源跟企劃</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="10">
                                <label class="form-check-label">液壓專家</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="11">
                                <label class="form-check-label">物流倉儲業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="12">
                                <label class="form-check-label">工業自動化</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="13">
                                <label class="form-check-label">媒體出版業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="14">
                                <label class="form-check-label">運輸和物流</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="15">
                                <label class="form-check-label">精密儀器操作</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="16">
                                <label class="form-check-label">專業科學教學</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="17">
                                <label class="form-check-label">現場技術員電機工程</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="18">
                                <label class="form-check-label">醫療保健</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="19">
                                <label class="form-check-label">藝術、娛樂及休閒服務業</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="20">
                                <label class="form-check-label">執法</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="interest_industry01" name="interest_industry[]" value="21 ">
                                <label class="form-check-label">商業/諮詢/管理
                            </div>
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cdistrict">科系</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department01" name="department[]" value="1">
                                <label class="form-check-label">資工</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department02" name="department[]" value="2">
                                <label class="form-check-label">電機</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department03" name="department[]" value="3">
                                <label class="form-check-label">航太工程</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department04" name="department[]" value="4">
                                <label class="form-check-label">機械</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department05" name="department[]" value="5">
                                <label class="form-check-label">化工</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department06" name="department[]" value="6">
                                <label class="form-check-label">材料</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department07" name="department[]" value="7">
                                <label class="form-check-label">設計學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department08" name="department[]" value="8">
                                <label class="form-check-label">工程</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department09" name="department[]" value="9">
                                <label class="form-check-label">物理</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department10" name="department[]" value="10">
                                <label class="form-check-label">數學及統計學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department11" name="department[]" value="11">
                                <label class="form-check-label">遊戲設計</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department12" name="department[]" value="12">
                                <label class="form-check-label">化學</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department13" name="department[]" value="13">
                                <label class="form-check-label">生命科學學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department14" name="department[]" value="14">
                                <label class="form-check-label">建築及都市規劃學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department15" name="department[]" value="15">
                                <label class="form-check-label">農林食品科學學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department16" name="department[]" value="16">
                                <label class="form-check-label">運輸服務學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department17" name="department[]" value="17">
                                <label class="form-check-label">醫藥衛生學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department18" name="department[]" value="18">
                                <label class="form-check-label">運輸服務學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department19" name="department[]" value="19">
                                <label class="form-check-label">獸醫學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department20" name="department[]" value="20">
                                <label class="form-check-label">計算語言學</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department21" name="department[]" value="21">
                                <label class="form-check-label">環境保護學類</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department22" name="department[]" value="22">
                                <label class="form-check-label">機械電子學</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department23" name="department[]" value="23">
                                <label class="form-check-label">工藝技術員金屬冶金</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department24" name="department[]" value="24">
                                <label class="form-check-label">通訊工程</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="department25" name="department[]" value="25">
                                <label class="form-check-label">動力機械群
                            </div>
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cdistrict">應徵職務</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application01" name="job_application[]" value="1">
                                <label class="form-check-label">人工智能（AI）/機器學習工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application02" name="job_application[]" value="2">
                                <label class="form-check-label">資安工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application03" name="job_application[]" value="3">
                                <label class="form-check-label">電腦研究工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application04" name="job_application[]" value="4">
                                <label class="form-check-label">軟體開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application05" name="job_application[]" value="5">
                                <label class="form-check-label">前端開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application06" name="job_application[]" value="6">
                                <label class="form-check-label">後端開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application07" name="job_application[]" value="7">
                                <label class="form-check-label">全端開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application08" name="job_application[]" value="8">
                                <label class="form-check-label">DevOps工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application09" name="job_application[]" value="9">
                                <label class="form-check-label">物流網工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application10" name="job_application[]" value="10">
                                <label class="form-check-label">工業自動化工程</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application11" name="job_application[]" value="11">
                                <label class="form-check-label">系統分析師DBA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application12" name="job_application[]" value="12">
                                <label class="form-check-label">軟體開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application13" name="job_application[]" value="13">
                                <label class="form-check-label">Java 開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application14" name="job_application[]" value="14">
                                <label class="form-check-label">電腦硬體工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application15" name="job_application[]" value="15">
                                <label class="form-check-label">移動應用開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application16" name="job_application[]" value="16">
                                <label class="form-check-label">Web Designer (UI/UX Designer)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application17" name="job_application[]" value="17">
                                <label class="form-check-label">技術銷售工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application18" name="job_application[]" value="18">
                                <label class="form-check-label">Python開發工程師</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="job_application19" name="job_application[]" value="19">
                                <label class="form-check-label">網路系統工程師
                            </div>
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button" onclick="return doSubmit();">下一步</button>
                    </div>
                    <div class="form-message">
                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of standard form -->
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</div>
<!-- end of form-3 -->
<!-- end of content -->

<!-- Scripts -->
<script src="/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
<script src="/js/jquery.countTo.js"></script> <!-- jQuery countTo for counting animation -->
<script src="/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header-->
<script src="/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="/js/scripts.js"></script> <!-- Custom scripts -->

<script>
    function doSubmit()
    {
        /*
        if($('#name').val()=='')
        {
            alert('請輸入姓名！');
            $('#name').focus();
            return false;
        }
        else if($('#position1').val()=='')
        {
            alert('請選擇職務1！');
            $('#position1').focus();
            return false;
        }
        else if($('#familypart').val()=='')
        {
            alert('請選擇小家別！');
            $('#familypart').focus();
            return false;
        }
        else if($('#gender').val()=='')
        {
            alert('請選擇性別！');
            $('#gender').focus();
            return false;
        }
        else if($('#blood').val()=='')
        {
            alert('請輸入血型！');
            $('#blood').focus();
            return false;
        }
        else if($('#birthday').val()=='')
        {
            alert('請輸入生日！');
            $('#birthday').focus();
            return false;
        }
        else if($('#pid').val()=='')
        {
            alert('請輸入身分證字號！');
            $('#pid').focus();
            return false;
        }
        else if($('#mobile').val()=='')
        {
            alert('請輸入手機！');
            $('#mobile').focus();
            return false;
        }
        else if($('#address').val()=='')
        {
            alert('請輸入戶籍地址！');
            $('#address').focus();
            return false;
        }
        else if($('#professionid').val()=='')
        {
            alert('請輸入專業證號！');
            $('#professionid').focus();
            return false;
        }
        else
        { */
        if(confirm('確定送出?')) {
            $('#wait_content').show();
            $('#wait').show();

            $('#StandardForm').submit();
        }
    }
</script>