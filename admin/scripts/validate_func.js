  $(document).ready(function(){
							 
						 
			$("#cadastrar_posts").validate({
						   
				rules:{
				thumb:{required:true},
				titulo:{required: true, minlength: 5},
				categoria:{required: true},
				data:{required: true, date:true, dateISO:true}
				},
				
				messages:{
			    thumb:{required: "A imagem deve ser informada"},
				titulo:{required: "O titulo é obrigátorio", minlength: "No minimo 5 caracteres devem ser digitados aqui"},
				categoria:{required: "Selecione a categoria do seu post"},
				data:{required: "A data deve ser digitada", date: "data digitada é inválida", dateISO: "O formato da data é inválido (dd/mm/yyyy)"}
				},						   

			});
			
  });