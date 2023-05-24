function obrisiSat(deleteid){
    console.log(deleteid)
    $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: { deletesend: deleteid  },
        
        success: function(data, status){
           // console.log(data)
            location.reload(true);
            alert("Uspesno obrisano!");
        }
        
    });
   

}

 function dodaj () {

    var form = $('#addform')[0];
    var formData = new FormData(form);
    event.preventDefault();  
    console.log(formData);


    request = $.ajax({  
        url: 'handler/add.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });

    request.done(function (response, textStatus, jqXHR) {
        


            alert("Sat dodat ");
            console.log("Uspesno dodavanje");
            location.reload(true);
        
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
};

function azurirajSat(updateid){

    $.post("handler/get.php",{updateid:updateid},function(data,status){

        var sat = JSON.parse(data);
        $('#idU').val(sat.id);
        $('#modelU').val(sat.model);
        $('#brendU').val(sat.brend);
        $('#cenaU').val(sat.cena);
        $('#materijalU').val(sat.materijalNarukvice);
        $('#vrsteU').val(sat.mehanizamVrsta);




    });




}

function potvrdiAzuriranje(){

    var form = $('#updateform')[0];
    var formData = new FormData(form);
    event.preventDefault();  
    console.log(formData);


    request = $.ajax({  
        url: 'handler/update.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });

    request.done(function (response, textStatus, jqXHR) {
        

            console.log(response);
            alert("Sat azuriran ");
            console.log("Uspesno azuriranje");
            location.reload(true);
        
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
}




 

 
function pretragaPoBrendu() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("pretraga");
    filter = input.value.toUpperCase();
    table = document.getElementById("satoviTbl");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



function sortiraj() {
 
    var table, rows, switching, i, j, z, k, x, y, shouldSwitch;
    table = document.getElementById("satoviTbl");


    var e = document.getElementById("kriterijum");
    console.log(e);
    var result = e.options[e.selectedIndex].value;
   console.log(result);

 



    //SORT po ceni
    // sortira tako da najjeftiniji postovi idu na vrh
    if (result == "price") {
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            for (j = i + 1; j < rows.length; j++) {
                x = rows[i].getElementsByTagName("TD")[2]; //<td>100</td>
                y = rows[j].getElementsByTagName("TD")[2];
                z = parseInt(x.innerHTML);//100
                k = parseInt(y.innerHTML);
                if (z > k) {
                    rows[i].parentNode.insertBefore(rows[j], rows[i]);
                }
            }
        }

    }


    //SORT po modelu  
 
    if (result == "name") {
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            for (j = i + 1; j < rows.length; j++) {
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[j].getElementsByTagName("TD")[0];

                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    rows[i].parentNode.insertBefore(rows[j], rows[i]);
                }
            }
        }
    }


}






 


