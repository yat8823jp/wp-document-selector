jQuery(function($){
// console.log("aaa");
	var selector_id = "select#selectname";
	var elem_all = Array();

	activeSelect(selector_id);

	function activeSelect(selector){
		//selected display "block"
		var content = $(selector).children("option:selected");
		content = "#"+content[0].className;
		$(content).css("display","block");
	}

	function changeActive(selector){
		//active foucus check
		var activeclass = $(selector).find("option").prop("selectedIndex",0);

		//selected display "hidden"
		var selectall = $(selector).children("option");

		for(var i=0; i<selectall.length; i++){
			elem_all[i] = "#" + selectall[i].className;
			$(elem_all[i]).css("display","none");
		}

		activeSelect(selector);
	}
	
	if (document.addEventListener) {
		 document.querySelector(selector_id).addEventListener("change",changeActive(selector_id),false);
	}else{
		//for ie8&Opera
		document.querySelector(selector_id).attachEvent("onclick",changeActive(selector_id));
	};
})(jQuery);