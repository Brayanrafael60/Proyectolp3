$(document).ready(function(){

    //Matricularse
    var formMatricularse = document.querySelector("#formMatricularse");
    if(document.querySelector("#formMatricularse")){
        formMatricularse.onsubmit = function(e) {
            e.preventDefault();
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/matricula/store'; 

            var formData = new FormData(formMatricularse);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/matricula';
                        },1000);
                    }else{

                    }
                }else{
                   
                }
          
                return false;
            }
        };
    }

    // filtro horario por ciclo
    $(document).on("change","#ciclo, #pap", function(e){
        e.preventDefault();

        let ciclo = document.querySelector('#ciclo').value;
        let pap = document.querySelector('#pap').value;
        window.location.href = base_url+'/verhorario/'+ciclo+'/'+pap;
    });
    
});