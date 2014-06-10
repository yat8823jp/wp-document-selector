jQuery(function($){
// console.log("aaa");
	var selector_id = "select#selectname";
	var elem_all = Array();

	activeSelect();

	function activeSelect(){
		//selected display "block"
		var content = $(selector_id).children("option:selected");
		content = "#"+content[0].className;
		$(content).css("display","block");
	}

	function changeActive(){
		//active foucus check
		var activeclass = $(selector_id).find("option").prop("selectedIndex",0);

		//selected display "hidden"
		var selectall = $(selector_id).children("option");

		for(var i=0; i<selectall.length; i++){
			elem_all[i] = "#" + selectall[i].className;
			$(elem_all[i]).css("display","none");
		}

		activeSelect();
	}
	
	if (document.addEventListener){
		 document.querySelector(selector_id).addEventListener("change",changeActive,false);
	}else{
		//for ie8&Opera
		document.querySelector(selector_id).attachEvent("onclick",changeActive);
	};
});