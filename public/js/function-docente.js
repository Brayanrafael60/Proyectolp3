$(document).ready(function(){

    //Matricularse
    var formMatricularse = document.querySelector("#newData");
    if(document.querySelector("#newData")){
        newData.onsubmit = function(e) {
            e.preventDefault();
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/docente/store';

            var formData = new FormData(newData);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/docente';
                        },1000);
                    }else{

                    }
                }else{
                   
                }
          
                return false;
            }
        };
    }
    
});