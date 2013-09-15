function fullFields()
{
	var campos = new Array("Oscar Mauricio","Aguillon Silva","aguillon_@hotmail.com","300 421 2136");
	for (var i = 0; i <= 4; i++) {
			$("section#formulario form input").eq(i).val(campos[i]);
	};
}

$(document).on("ready",function(){

	$("button#send").on("click",function(){
	var field = $("section#formulario form").serialize();
	var userFail = "error";
/*
		$.ajax({
			beforeSend: function(){
				$("section#loading").fadeIn(300);
			},
			type: "post",
			//dataType : 'jsonp',
			url: "http://imagineriaweb.com/oaguillon/cross_domain/proccess.php",
			data: field,
			success: function(info){
				console.log(info);		
				$("section#loading").fadeOut(300);
			}
		});

*/

		$.post("http://imagineriaweb.com/oaguillon/cross_domain/proccess.php", field , function(data){
			console.log(data);
				$("section#debug").append(data);
				var obj = $.parseJSON(data);
				$("section#resultado h1#name").append(obj.name+' '+obj.lastname);
				$("section#resultado #Email").append('<span>Email: </span>'+obj.email);
				$("section#resultado #CellPhone").append('<span>Celular: </span>'+obj.cellPhone);
				localStorage.setItem("user",obj.email);
		});

			// console.log(field);
	});//================== ending onclick


$("input#clean").on("click",function(){
	localStorage.removeItem("user");
});

var user = localStorage.getItem("user");
if (user) {
	$("section#top").html(user);
}else{
	$("section#top").html("Please you have singUp");
};




});//================== ending docuemnt.ready