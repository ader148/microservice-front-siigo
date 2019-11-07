
const baseURL = "http://localhost:8081/hacksiigo/";

$(document).ready(function(){

    showItems("",1);

    $('#formItem').submit(function(e){

        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                res = $.parseJSON(res);

                $("#modalItem").modal('hide');
                $("#formItem")[0].reset();
                showItems("",1);
            }
        });   
    });

    $("#findItem").keyup(function() {
        key = $(this).val();
        showItems(key,1);
    });

    $('body').on('click', '#item-list a.edit', function(e){

        e.preventDefault();

        id = $(this).attr("href");
        $("#modalCheck").modal('show');


        $("#btnAccept").click(function(e){
            $.ajax({
                url: baseURL + "Home/edit",
                type: "POST",
                data: {id: id},
                dataType: "json",
                success: function(res){
                    if(res){
                        $("#modalCheck").modal('hide');
                        showItems("",1);
                        
                    }
                    console.log(res);
                } 
            });
        });
    });

    $("body").on('click', "#pag li a", function(e){

        e.preventDefault();

        val_href = $(this).attr("href");

        key = $("#findItem").val();
        showItems(key, val_href);
    });



});


function showItems(key, page) {

    $.ajax({
        url: baseURL + "Home/show",
        type: "post",
        data: { word: key, no_page: page },
        dataType: "json",
        success: function(res) {
            html = '';
            $.each(res.data, function(val, item) {
                let state = stateColor(item.item_state);
                html += `
                <tr>
                <td>${item.item_name}</td>
					<td>${item.loc_name}</td>
					<td>${item.item_stock}</td>
					<td class="bg-${state.color}"><p class="text-light text-center">${state.text}</p></td>
                    <td><a href="${item.item_id}"class="btn btn-success btn-sm edit" >Disponible</a></td>
                </tr>
				`;
            });
            $("#item-list").html(html);
            pagination(page, res.total, res.mount);
        }
    });
}

function stateColor(state){
    let data;
    
    if(state == 1){
        data ={
            color : 'success',
            text: 'Disponible'
        }
    }else{
        data ={
            color : 'danger',
            text: 'No Disponible'
        }
    }

    return data;
}

function EliinarEmpleado(idEmp){
    //alert(idEmp);

    var confirmation = confirm("Esta seguro que desea eliminar este empleado?");

    if (confirmation) {
        
        $.ajax({
            url: baseURL + "Eliminarempleado?emp="+idEmp,
            type: "post",
            data: { },
            dataType: "json",
            success: function(res) {
                alert('regreso');
                location.reload();
            }
        });
    
    }

    

}

function pagination(page, total, mount){

    let links = Math.ceil(total / mount);

    htmlPag = '';

    if(links => 1 ){

        htmlPag += `<ul class=" pagination justify-content-center">`;

        if(page == 1 || page !== 1){

            htmlPag += `<li class="page-item "><a href="${page - 1}" class="page-link bg-dark text-light">Prev</a></li>`;

            for(i = 1; i<= links; i++){

                if (page == i) {

                    htmlPag += `<li class="page-item active"><a href="javascript:void(0)" class="page-link bg-dark text-light">${i}<a/></li>`;
                }
                else{
                    htmlPag += `<li class="page-item"><a href="${i}" class="page-link bg-dark text-light">${i}<a/></li>`;
                }
            }
            if (page < links) {
                htmlPag += `<li class="page-item"><a href="${page + 1}" class="page-link bg-dark text-light" >Next</a></li>`;
            }
        }


        htmlPag += `</ul>`;
    }
    $("#pag").html(htmlPag);
}