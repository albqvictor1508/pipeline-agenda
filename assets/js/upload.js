$(document).ready(()=> {
  const mensagem = $("#mensagem");
  $("#edit-photo").hide();
  mensagem.hide();
  preloader.hide();
  
  $("#btn-editar-foto").on('click',()=> {
      $("#editar-foto").toggle();
  });
  
  $("#").on('click',(event)=> {
      event.preventDefault();
      $("#form-upload-foto").ajaxForm({
          url:'./paginas/contatos/upload/executa-upload.php',
          success:(data)=> {
              const msg = data.substring(0,data.indexOf(';'));
              const tipoMsg = data.substring(data.indexOf(';')+1);

              if(tipoMsg === "completed"){
                  const photoPath = msg;
                  msg = "Upload da foto realizado com sucesso!";
                  $("#foto-contato").attr("src",photoPath +"?timestamp="+ new Date().getTime());
                  mensagem.show().attr("class","mb-3 alert alert-success").html(msg);
              }else if(tipoMsg === "warning"){
                  mensagem.show().attr("class","mb-3 alert alert-warning").html(msg);
                  preloader.hide();
              }else{
                  mensagem.show().attr("class","mb-3 alert alert-danger").html(msg);
                  preloader.hide();
              }
          },
          error:(data)=> {
              console.log(data);
          }
      }).submit();
  })
});