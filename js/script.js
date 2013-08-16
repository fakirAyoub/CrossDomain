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

		/*$.ajax({
			type: "get",
			dataType : 'jsonp',
			url: "http://imagineriaweb.com/oaguillon/cross_domain/proccess.php",
			data: field,
			success: function(info){
				console.log(info);		
				$.each(info,function(c,v){
					//console.log(c + '=>' + v);
					if (userFail == c) {
						alert("Fatal error user validation");
						$("#resultado").append("Fatal error user validation");
					}else{
						$("#resultado").append(c + '=>' + v);
					};
				});
			}
		});*/


		$.post("http://imagineriaweb.com/oaguillon/cross_domain/proccess.php", field , function(data){
			console.log(data);
				$("section#debug").append(data);
				var obj = $.parseJSON(data);
				$("section#resultado h1#name").append(obj.name+' '+obj.lastname);
				$("section#resultado #Email").append('<span>Email: </span>'+obj.email);
				$("section#resultado #CellPhone").append('<span>Celular: </span>'+obj.cellPhone);
		});


	// console.log(field);
	});//================== ending onclick
});//================== ending docuemnt.ready