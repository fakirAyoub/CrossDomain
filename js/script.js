function fullFields()
{
	var campos = new Array("aguillon_@hotmail.com","6203222ags");
	for (var i = 0; i <= 2; i++) {
			$("section#formulario form input").eq(i).val(campos[i]);
	};
}


function removeUser(){
	var session = localStorage.getItem("user");    	
console.log(session);
	if (session) {
		$("section#top").html(session);
		$("input#clean").on("click",function(){
			localStorage.removeItem("user");
			$("section#top").html("Usted a cerrado sesion");
		});
	};

}




$(document).on("ready",function(){

	removeUser();

	$("input#send").on("click",function(){
	var field = $("section#formulario form").serialize();

		$.ajax({
			beforeSend: function(){
				$("section#loading").fadeIn(300);
			},
			type: "post",
			url: "http://imagineriaweb.com/oaguillon/cross_domain/proccess.php",
			data: field,
			success: function(info){			
             	
             	lista = JSON.parse(info);
 
		        for(var i in lista){
		            if (!lista[i].error) {
		            	var addSession = localStorage.setItem("user",lista[i].mail);
		            	var session = localStorage.getItem("user");   
		            	$("section#top").html(session);
		            	$("section#debug").html(lista[i].name+" "+lista[i].lastname+" "+lista[i].mail);
		            }else{
		            	$("section#debug").html("Usuario o pasword no coinciden");		            	
		            };	            
		        }

		        $("section#loading").fadeOut(300);

			},
			error: function (obj, error, objError){
            	console.log("We have an error");
        	},
			complete: function(){
				
			}
		});// ======= end ajax method





			// console.log(field);
	});//================== ending onclick






});//================== ending docuemnt.ready