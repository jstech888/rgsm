var getLocation = function(href) {
    var l = document.createElement("a");
    l.href = href;
    return l;
}

var PM = {
	defaultParam : { shadow: true, opacity: "0.75", stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 600 },
	errorParam : { title: "系統異常", text: '該動作暫時無法完成！', type: "danger" },
	show : function(cust){
		var param = $.extend(true, this.defaultParam, cust );
		new PNotify(param);
	},
	erro : function(cust) {
		var errp = { title: "系統異常", text: '該動作暫時無法完成！', type: "danger" };
		var param = $.extend(true, this.defaultParam, this.errorParam );
		param = $.extend(true, param, cust );
		new PNotify(param);
	}
}

function formatFloat(num, pos)
{
  var size = Math.pow(10, pos);
  return Math.round(num * size) / size;
}
function savePageMeta(PageMeta)
{
	$.ajax({
		url: "/pagemeta/save",
		async:true,
		cache:false,
		method:"POST",
		data:PageMeta,
		success:function(data, status, xhr){
			console.log(data, status, xhr);
		},
		error:function(xhr, stauts, err){
			console.log(xhr, stauts, err);
		}
	});
}

function MessageBoard (aid)
{
	var msg = $("#MessageBoard-reply").val();
	$.ajax({
		url: "/blog/reply",
		async:true,
		cache:false,
		method:"POST",
		data:{
			aid : aid,
			msg : msg
		},
		success:function(data, status, xhr){
			//console.log(data, status, xhr);
			PM.show({ title: objLang.bloger.msgSuccess, text: "", type: "info"});
			location.reload();
		},
		error:function(xhr, stauts, err){
			//console.log(xhr, stauts, err);
			PM.erro({title: objLang.bloger.msgSuccess});
		}
	});
}

function sendMsgToBlog(bid)
{
	var msg = $("#sendMsgToBlog-content").val();
	$.ajax({
		url: "/blog/msgtoblog",
		async:true,
		cache:false,
		method:"POST",
		data:{
			bid : bid,
			msg : msg
		},
		success:function(data, status, xhr){
			//console.log(data, status, xhr);
			PM.show({ title: objLang.bloger.msgSuccess, text: "", type: "info"});
			//location.reload();
		},
		error:function(xhr, stauts, err){
			//console.log(xhr, stauts, err);
			PM.erro({title: objLang.bloger.msgFailed});
		}
	});
}


function removeProduct( PID )
{
	$.ajax({
			url: "/user/followlist/save",
			async:true,
			cache:false,
			method:"POST",
			data:{
				"PID" : PID
			},
			success:function(data, status, xhr){
				PM.show({ title: objLang.followlist.removeSuccess, text: '', type: "info"});
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				PM.erro({title: objLang.followlist.removeFailed});
			}
		});
}


function enterSearch(device) 
{
	if(device == "mobile")
	{
		var _targe = $(".mobile-shopping-money");
		if( _targe.hasClass("face") ) 
		{
			_targe.removeClass("face").addClass("back");
		}
		else 
		{
			var keyword = $("#product-keyword-"+device).val();
			if( keyword.length > 0 )
			{
				FormSubmit({
					method: "POST",
					action: "product/index",
					data: { keyword : keyword }
				});
				return;
			}
			_targe.removeClass("back").addClass("face");
		}
		
		if( _targe.hasClass("face") )
		{
			_targe.find(".card.front").addClass("slideInRight");
			setTimeout(function(){
				_targe.find(".card.front").removeClass("slideInRight");
			},800);
			
		}
		else
		{
			_targe.find(".card.backend").addClass("slideInRight");
			setTimeout(function(){
				_targe.find(".card.backend").removeClass("slideInRight");
			},800);
		}
			 
		return;
	}
	else
	{
		var keyword = $("#product-keyword-"+device).val();
		FormSubmit({
			method: "POST",
			action: "product/index",
			data: { keyword : keyword }
		});
	}
}

function FormSubmit(options) {
	var defaults = { 
        method: "POST",
        action: false,
        data: {}
    };
    var settings = $.extend(true, defaults, options);
	
	var result = false;
	if( UrlExists( settings.action ) )
	{
		result =  true;
		var form = document.createElement("form");
		form.method = settings.method;
		form.action = settings.action;
		for( var k in settings.data )
		{
			var element = document.createElement("input"); 
			element.name 	= k;
			element.value 	= settings.data[k];
			form.appendChild(element);  
		}
		document.body.appendChild(form);
		form.submit();
	}
	return result;
}

function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

function renewFile(file)
{	
	file['url'] 		= getLocation(file.url).pathname;							
	file['mediumUrl']	= getLocation(file.mediumUrl).pathname;
	file['thubnailUrl'] = getLocation(file.thubnailUrl).pathname;
	file['src'] 		= getLocation(file.url).pathname.replace(/\//,'');	
	return file;
}

function action( link )
{
	location.href = link;
}

function MainLangCode(){
	$(".main-langCode li a").each(function(){
		$(this).unbind("click");
		$(this).bind("click",function(e){
			var newParam = {};
			for( var k in Url.get )
			{
				if( k != "lang" )
				{
					newParam[k] = Url.get[k];
				}
			}
			newParam.lang = $(this).attr("data-langCode");
			
			location.href = window.location.pathname + "?" + $.param(newParam);
		});
	});
}

Url = {
    get get(){
        var vars= {};
        if(window.location.search.length!==0)
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){
                key=decodeURIComponent(key);
                if(typeof vars[key]==="undefined") {vars[key]= decodeURIComponent(value);}
                else {vars[key]= [].concat(vars[key], decodeURIComponent(value));}
            });
        return vars;
    }
};

function touchProduct()
{
	setTimeout(function(){
		$.ajax({
			url: "/product/touch",
			async:false,
			cache:false,
			method:"GET",
			success:function(data, status, xhr){
				if( typeof(console) == "object" )
				{
					if( typeof(console.log) == "function" )
					{
						console.log(data, status, xhr);						
					}
				}
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err);
			}
		});
	},11000);
}

function touchBlog()
{
	setTimeout(function(){
		$.ajax({
			url: "/blog/touch",
			async:false,
			cache:false,
			method:"GET",
			success:function(data, status, xhr){
				if( typeof(console) == "object" )
				{
					if( typeof(console.log) == "function" )
					{
						console.log(data, status, xhr);						
					}
				}
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err);
			}
		});
	},11000);
}

function delRealImage(Path)
{
	$.ajax({
		url: "/media/del",
		async:false,
		cache:false,
		method:"POST",
		data:{
			"FileUrl" : Path
		},
		success:function(data, status, xhr){
			console.log(data, status, xhr);
		},
		error:function(xhr, stauts, err){
			console.log(xhr, stauts, err);
		}
	});
}

function pageReload()
{
	$('.page-reload').click(function(e){
		var l = Ladda.create(this);
		l.start();
		setTimeout(function(){
			var iframe = document.getElementById('preview-widget');
			iframe.src = iframe.src;
			l.stop();
		},1000);
	});	
}

function pageLangCode()
{
	$(".main-langCode li a").each(function(){
		$(this).unbind("click");
		$(this).bind("click",function(e){
			$(".main-tab-content").fadeOut(500);
			var langCode = $(this).attr("data-langCode");
			setTimeout(function(){
				init_menuItem();
				$(".main-tab-content").fadeIn(500);
			},500);
			
		});
	});
	
	$('.main-langCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
		var langCode 	= $(this).attr("data-langCode");
	});
	
	$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var langCode 	= $(this).attr("data-langCode");
		var psrc 		= preview_src+"?lang="+langCode;
		var iframe 		= document.getElementById('preview-widget');
		iframe.src 		= psrc;
	});
}

var MediaStack = {
	api : false,
	popup : function(cust) {
		var def = {
			height : '400',
			selectActionFunction : function (e) { }
		};
		var param = $.extend(true, {}, def, cust);  
		this.api = CKFinder.popup(param);
	},
	convertFileObject : function(path) {
		var thumbPath = path.replace('userfiles','userfiles/_thumbs');
		return {			
			'url' : getLocation(path).pathname,				
			'thubnailUrl' : getLocation(thumbPath).pathname,
			'src' : getLocation(path).pathname.replace(/\//,'')
		};
	}
}

var refer_uri = false;
$(function(){
	var BASEURI = ( refer_uri === false ) ? getLocation(window.location.href).pathname : refer_uri;
	$("#sidebar_left .sub-nav > li > a").each(function(){
		var CNTURI = getLocation($(this).attr("href")).pathname;
		if( CNTURI != "#" && CNTURI != "")
		{
			if( BASEURI == CNTURI )
			{
				$(this).parent().parent().parent().addClass("active");
				$(this).parent().parent().parent().find(".accordion-toggle").addClass("menu-open");
				$(this).parent().addClass("active");
			}
		}
	});
	$("#sidebar_left .sidebar-menu > li").each(function(){
		if($(this).hasClass("sidebar-label") === false)
		{
			$(this).find("a").each(function(){
				if( $(this).attr("href") != "#" )
				{
					var CNTURI = getLocation($(this).attr("href")).pathname;
					if( CNTURI != "#" && CNTURI != "")
					{
						if( BASEURI == CNTURI )
						{
							$(this).addClass("active");
						}
					}
				}
			});
		}
	});
});


function redirect(href)
{
	location.href = href;
}