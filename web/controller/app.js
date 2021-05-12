$(function () {

console.log("jQuery esta funcionando");
        //VISUALIZE BOOKING TABLE ON LOAD
        fecthBooks();
        
        //SEARCH RESERVES BY DATE
        $("#datepicker").change(function () {
if ($("#datepicker").val()) {
let date = $("#datepicker").val();
        let datearray = date.split("/");
        date = datearray[2] + '-' + datearray[0] + '-' + datearray[1];
        let currentMail = document.getElementById("currentMail").textContent;
        document.querySelector("#datepicker").value = date;
        $.ajax({
        url: "../controller/BookingsC.php",
                type: "POST",
                data: {date},
                success: function (response) {
                    

                let reserves = JSON.parse(response);
                       
                        template = "";
                        reserves.forEach(reserve => {
                            
                        template += `
                                    
                                        <tr class="${reserve.id}">
                                             <td>${reserve.date}</td>
                                             <td>${reserve.mail}</td>`;
                                if (currentMail === `${reserve.mail}`) {
                        template += `<td><button class="reserve-delete btn btn-danger"><span class="material-icons-outlined">delete</span></button></td>`;
                        } else {
                        template += `<td></td>`;
                        }

                        template += `</tr>`;
                        });
                        $("#table-booking").html(template);
                        $("#table-booking").show();
                }
        });
        } else {
fecthBooks();
        }
});
////INSERT NEW RESERVE
//
        $("#button-reserve").click(
             function () {
                if ($("#datepicker").val()) {
                    let date = $("#datepicker").val();
                   
//                    document.querySelector("#datepicker").value = date;
                    let currentMail = document.getElementById("currentMail").textContent;
                    let url= "../controller/BookingsC.php";
                     const postDate = {                                     
                                    dateReserve:date,
                                    mail:currentMail
                                };
                    $.post(url, postDate, function (response) {
                        
                            
                            let confirmed = response;
                            if (confirmed == 1){
                                alert("Day Reserved");
                                fecthBooks();
                            } else
                            {
                                alert("Day Ocupied");
  
                            }
                       document.querySelector("#datepicker").value = ""; });
                    }
             }
            
        );

    //CANCEL BOOKING
    $(document).on("click", ".reserve-delete", function () {
        if (confirm("Are you sure that you want to delete it?")) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr("class");
       
            $.post("../controller/BookingsC.php", {id}, function (response) {
               
                fecthBooks();
            });
        }
    });
        
        
////BUSCAR ELEMENTOS EN LA TABLA
//    $("#search").keyup(function () {
//        if ($("#search").val()) {
//            let search = $("#search").val();
//            $.ajax({
//                url: "task-search.php",
//                type: "POST",
//                data: {search},
//                success: function (response) {
//                    let tareas = JSON.parse(response);
//                    template = "";
//
//                    tareas.forEach(tarea => {
//                        template += `<tr class="${tarea.id}">
//                                        <td>${tarea.id}</td>
//                                        <td><a href"#" class="task-item">${tarea.name}</a></td>
//                                        <td>${tarea.description}</td>
//                                        <td><button class="task-delete btn btn-danger"><span class="material-icons-outlined">delete</span></button></td>
//                                    </tr>`;
//                    });
//                    $("#tasks").html(template);
//                    $("#tasks").show();
//                }
//            });
//
//        } else {
//            fecthTasks();
//        }
//    });
////INSERTAR NUEVO REGISTRO
//    $("#task-form").submit(function (e) {
//        const postData = {
//            name: $("#name").val(),
//            description: $("#description").val(),
//            id: $("#taskId").val()
//
//        };
//        url = "";
//        if (edit === false) {
//            url = "task-add.php";
//        } else {
//            url = "task-edit.php";
//        }
//        $.post(url, postData, function (response) {
//
//            console.log(response);
//            fecthTasks();
//            edit = false;
//
//            $("#task-form").trigger("reset");
//        });
//        e.preventDefault();
//    });
//    //CARGAR TODOS LOS ELEMENTOS DE LA TABLA
//    function fecthTasks() {
//        $.ajax({
//            url: "task-list.php",
//            type: "GET",
//            success: function (response) {
//                let tareas = JSON.parse(response);
//                template = "";
//
//                tareas.forEach(tarea => {
//                    template += `<tr class="${tarea.id}">
//                                    <td>${tarea.id}</td>
//                                    <td><a href"#" class="task-item">${tarea.name}</a></td>
//                                    <td>${tarea.description}</td>
//                                    <td><button class="task-delete btn btn-danger"><span class="material-icons-outlined">delete</span></button></td>
//                                </tr>`;
//                });
//                $("#tasks").html(template);
//                $("#tasks").show();
//            }
//        });
//    }
//
//
//    //BORRAR OBJETOS DE LA TABLA
//    $(document).on("click", ".task-delete", function () {
//        if (confirm("Are you sure that you want to delete it?")) {
//            let element = $(this)[0].parentElement.parentElement;
//            let id = $(element).attr("class");
//            $.post("task-delete.php", {id}, function (response) {
//                console.log(response);
//                fecthTasks();
//            });
//        }
//
//
//    });
//    //EDITAR OBJETOS DE LA TABLA
//    $(document).on("click", ".task-item", function () {
//        console.log("editando");
//        idEdit = 0;
//        let element = $(this)[0].parentElement.parentElement;
//        let id = $(element).attr("class");
//        $.post("task-single.php", {id}, function (response) {
//            const tarea = JSON.parse(response);
//            $("#name").val(tarea.name);
//            $("#description").val(tarea.description);
//            $("#taskId").val(tarea.id);
//            edit = true;
//            fecthTasks();
//        });
//
//
//    });






        /**
         * FUNCTION VISUALIZE BOOKING TABLE 
         */

                function fecthBooks() {
                let currentMail = document.getElementById("currentMail").textContent;
                        let bookList = 1;
                        $.ajax({
                        url: "../controller/BookingsC.php",
                                type: "POST",
                                data: {bookList},
                                success: function (response) {


                                let reserves = JSON.parse(response);
                                        template = "";
                                        reserves.forEach(reserve => {
                                        template += `
                                    
                                        <tr class="${reserve.id}">
                                             <td><a href"#" class="task-item">${reserve.date}</a></td>
                                             <td>${reserve.mail}</td>`;
                                                if (currentMail === `${reserve.mail}`) {
                                        template += `<td><button class="reserve-delete btn btn-danger"><span class="material-icons-outlined">delete</span></button></td>`;
                                        } else {
                                        template += `<td></td>`;
                                        }

                                        template += `</tr>`;
                                        });
                                        $("#table-booking").html(template);
                                        $("#table-booking").show();
                                }
                        });
                }
        ;
        }



);                 