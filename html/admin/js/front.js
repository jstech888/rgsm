var PM = {
	defaultParam : { shadow: true, opacity: "0.75", stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 1400 },
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
}();
