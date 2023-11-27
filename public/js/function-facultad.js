$(document).ready(function(){
    // create
    $(document).on("click",".create", function(e){
        e.preventDefault();
        document.querySelector('#idfacultad').value ="";
        document.querySelector('#modaltitle').innerHTML = "Nuevo facultad";
        document.querySelector('.btnsave').innerHTML ="Guardar";
        document.querySelector('#newData').reset();
        $('#create').modal('show');
    });


    // edit
    $(document).on("click",".edit", function(e){
        e.preventDefault();

        document.querySelector('#idfacultad').value ="";
        document.querySelector('#modaltitle').innerHTML = "Actualizar facultad";
        document.querySelector('.btnsave').innerHTML ="Actualizar";
        var id = this.getAttribute("dat");
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/facultad/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#idfacultad').value = objData[0].idfacultad;
                    document.querySelector('#facultad').value = objData[0].facultad;
                    document.querySelector('#celEstado').value = objData[0].estado;
                
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
            var ajaxUrl = base_url+'/facultad/store';

            if(document.querySelector('#idfacultad').value > 0){
                var ajaxUrl = base_url+'/facultad/update';
            }

            var formData = new FormData(newData);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/facultad';
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
        var ajaxUrl = base_url+'/facultad/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#celId').innerHTML = objData[0].idfacultad;
                    document.querySelector('#celFacultad').innerHTML = objData[0].facultad;
                    document.querySelector('#celDatecreated').innerHTML = objData[0].datecreated;
                    document.querySelector('#celEstado').innerHTML = objData[0].estado == 1 ? 'Activo' : 'Inactivo';
                
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
        var ajaxUrl = base_url+'/facultad/destroy';

        var formData = new FormData(document.querySelector("#destroy"));
        request.open("POST",ajaxUrl,true);
        request.send(formData);

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status){
                    setTimeout(function(){
                        window.location.href = base_url+'/facultad';
                    },1000);
                }else{

                }
            }
            return false;
        }
    });
    
});