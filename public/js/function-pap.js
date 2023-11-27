$(document).ready(function(){

    // create
    $(document).on("click",".create", function(e){
        e.preventDefault();
        document.querySelector('#idpap').value ="";
        document.querySelector('#modaltitle').innerHTML = "Nuevo programa";
        document.querySelector('.btnsave').innerHTML ="Guardar";
        document.querySelector('#newData').reset();
        $('#create').modal('show');
    });


    // edit
    $(document).on("click",".edit", function(e){
        e.preventDefault();

        document.querySelector('#idpap').value ="";
        document.querySelector('#modaltitle').innerHTML = "Actualizar programa";
        document.querySelector('.btnsave').innerHTML ="Actualizar";
        var id = this.getAttribute("dat");
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/pap/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#idpap').value = objData[0].idpap;
                    document.querySelector('#pap').value = objData[0].pap;
                    document.querySelector('#tipo').value = objData[0].tipo;
                    document.querySelector('#ciclos').value = objData[0].ciclos;
                    document.querySelector('#aniversario').value = objData[0].aniversario;
                    document.querySelector('#estado').value = objData[0].estado;
                    document.querySelector('#facultadid').value = objData[0].facultadid;
                
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
            var ajaxUrl = base_url+'/pap/store';

            if(document.querySelector('#idpap').value > 0){
                var ajaxUrl = base_url+'/pap/update';
            }

            var formData = new FormData(newData);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status){
                        setTimeout(function(){
                            window.location.href = base_url+'/pap';
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
        var ajaxUrl = base_url+'/pap/show/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData){
                    document.querySelector('#celidpap').innerHTML = objData[0].idpap;
                    document.querySelector('#celpap').innerHTML = objData[0].pap;
                    document.querySelector('#celtipo').innerHTML = objData[0].tipo;
                    document.querySelector('#celciclos').innerHTML = objData[0].ciclos;
                    document.querySelector('#celaniversario').innerHTML = objData[0].aniversario;
                    document.querySelector('#celdatecreated').innerHTML = objData[0].datecreated;
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
        var ajaxUrl = base_url+'/pap/destroy';

        var formData = new FormData(document.querySelector("#destroy"));
        request.open("POST",ajaxUrl,true);
        request.send(formData);

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status){
                    setTimeout(function(){
                        window.location.href = base_url+'/pap';
                    },1000);
                }else{

                }
            }
            return false;
        }
    });
    
});