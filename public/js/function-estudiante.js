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
                var text = "";
                objData.forEach(element => {
                    console.log(element.pap);
                    text += '<option value="'+element.idpap+'">'+element.pap+'</option>';
                });
                document.querySelector('#papid').innerHTML = text;
            }
            return false;
        }
    });

    // create
    $(document).on("click",".create", function(e){
        e.preventDefault();
        document.querySelector('#userid').value ="";
        document.querySelector('#modaltitle').innerHTML = "Nuevo estudiante";
        document.querySelector('.btnsave').innerHTML ="Guardar";
        document.querySelector('#newData').reset();
        $('#create').modal('show');
    });


    // edit
    $(document).on("click",".edit", function(e){
        e.preventDefault();

        document.querySelector('#userid').value ="";
        document.querySelector('#modaltitle').innerHTML = "Actualizar estudiante";
        document.querySelector('.btnsave').innerHTML ="Actualizar";
        var id = this.getAttribute("dat");
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/estudiante/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#userid').value = objData[0].id;
                    document.querySelector('#DNI').value = objData[0].DNI;
                    document.querySelector('#celular').value = objData[0].celular;
                    document.querySelector('#f_nacimiento').value = objData[0].f_nacimiento;
                    document.querySelector('#nombres').value = objData[0].nombres;
                    document.querySelector('#apellidos').value = objData[0].apellidos;
                    document.querySelector('#sexo').value = objData[0].sexo;
                    document.querySelector('#col_egreso').value = objData[0].col_egreso;
                    document.querySelector('#celular').value = objData[0].celular;
                
                    $('#create').modal('show');
                }
            }
            return false;
        }
    });

     // delete
     $(document).on("click",".delete", function(e){
        e.preventDefault();
        var id = this.getAttribute("dat");
        var row = this.parentNode.parentNode;
        document.querySelector('#name').innerHTML = row.cells[1].textContent;
        document.querySelector('#destroy #id').value = id;
        $('#delete').modal('show');
    });

    //store y update
    var newData = document.querySelector("#newData");
    if(document.querySelector("#newData")){
        newData.onsubmit = function(e) {
            e.preventDefault();
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/estudiante/store';

            if(document.querySelector('#userid').value > 0){
                var ajaxUrl = base_url+'/estudiante/update';
            }

            var formData = new FormData(newData);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/estudiante';
                        },1000);
                    }else{

                    }
                }
                return false;
            }
        };
    }

    // show
    $(document).on("click",".view", function(e){
        e.preventDefault();

        var id = this.getAttribute("dat");
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/estudiante/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#celidestudiante').innerHTML = objData[0].id;
                    document.querySelector('#celcodigo').innerHTML = objData[0].codigo;
                    document.querySelector('#celDNI').innerHTML = objData[0].DNI;
                    document.querySelector('#celnombres').innerHTML = objData[0].nombres;
                    document.querySelector('#celapellidos').innerHTML = objData[0].apellidos;
                    document.querySelector('#celcelular').innerHTML = objData[0].celular;
                    document.querySelector('#celsexo').innerHTML = objData[0].sexo;
                    document.querySelector('#sexo').innerHTML = objData[0].sexo;
                    document.querySelector('#celf_nacimiento').innerHTML = objData[0].f_nacimiento;
                    document.querySelector('#celcol_egreso').innerHTML = objData[0].col_egreso;
                    document.querySelector('#celestado').innerHTML = objData[0].estado == 1 ? 'Activo' : 'Inactivo';
                
                    $('#view').modal('show');
                }
            }
            return false;
        }
    });

    //destroy
    $(document).on("submit","#destroy", function(e){
        e.preventDefault();

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/estudiante/destroy';

        var formData = new FormData(document.querySelector("#destroy"));
        request.open("POST",ajaxUrl,true);
        request.send(formData);

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status){
                    setTimeout(function(){
                        window.location.href = base_url+'/estudiante';
                    },1000);
                }else{

                }
            }
            return false;
        }
    });
    
});