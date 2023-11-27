$(document).ready(function(){
    // option pap
    $(document).on("change","#facultad", function(e){
        e.preventDefault();

        let idfacultad = this.value;
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/pap/papFac/'+idfacultad;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                var text = '<option value="" hidden selected>Seleccione... </option>';
                objData.forEach(element => {
                    console.log(element.pap);
                    text += '<option value="'+element.idpap+'">'+element.pap+'</option>';
                });
                document.querySelector('#papid').innerHTML = text;
            }
            return false;
        }
    });

    // option curso prerequisito
    $(document).on("change","#papid", function(e){
        e.preventDefault();

        let idpap = this.value;
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/asignatura/asigPap/'+idpap;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                var text = '';
                objData.forEach(element => {
                    console.log(element.pap);
                    text += '<option value="'+element.codigo+'">'+element.codigo+' - '+element.nombre+'</option>';
                });
                text += '<option value="N/A">N/A</option>';
                document.querySelector('#prerequisito').innerHTML = text;
            }
            return false;
        }
    });
    
    //store
    var newData = document.querySelector("#newData");
    if(document.querySelector("#newData")){
        newData.onsubmit = function(e) {
            e.preventDefault();
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/asignatura/store';

            var formData = new FormData(newData);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/asignatura';
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