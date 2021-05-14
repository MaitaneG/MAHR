$(function () {

    /*
     * VISUALIZE BOOKING TABLE ON LOAD
     */
    fecthBooks();

    /*
     *VISUALIZE CANS CARDS WITHOUT BUTTON ON LOAD
     */
    fecthCansLessButtons();

    /*
     *VISUALIZE PENDENT TAXES ON LOAD
     */
    fecthPendentTaxes();

    /*
     * REGISTER PRODUCTION, VIEW CANS, INSERT TAX
     */
    console.log("jQuery esta funcionando 2");
    $("#registerProduction").click(function () {
        if ($("#production-kg").val()) {

            let kg = $("#production-kg").val();
            let litros = kg / 1.39;
            litros = litros.toFixed(2);
            let taxKg = 0.25;
            let tax = kg * taxKg;
            let currentMail = document.getElementById("currentMail").textContent;
            templateProduction = "";
            templateProduction += `<tr>
                                        <th>Litres</th><td>${litros}L </td><th>Tax</th><td>${tax}€</td><th>Left</th><td id="litres-left">${litros}</td>
                                     </tr>`;
            $("#production-litros").html(templateProduction);
            //REGISTER PRODUCTION
            if (confirm(`Are you sure to register ${kg}Kg of product?`)) {
                let url = "../controller/productionsC.php";
                const postDate = {
                    mail: currentMail,
                    kilos: kg,
                    taxes: tax
                };
                $.post(url, postDate, function (response) {
                    alert(response);
                    fecthCans();
                    fecthPendentTaxes();
                });
            }
        }

    });

    /*
     * MARK CANS WILL BE USED
     */
    $(document).on("click", ".reserveCanToUse", function () {


        let Id = $(this).attr("data-id");
        Id = parseInt(Id);
        let litresleftText = ($("#litres-left").text());
        let litresleft = parseInt(litresleftText);
        console.log(litresleft + 300);
        let url = "../controller/cansUseC.php";
        let currentMail = document.getElementById("currentMail").textContent;
        if (litresleft > 0) {

            const postDate = {
                mail: currentMail,
                elementId: Id
            };

            var capacity = 0;
            $.post(url, postDate, function (response) {

                let cans = JSON.parse(response);

                capacity = cans[0]["capacity"];
                console.log(capacity);
                $("#litres-left").html(litresleft - capacity);

            });



            fecthCans();
        } else {
            alert("you have saved all the production");
        }

    });

    /*
     * SEARCH RESERVES BY DATE
     */
    $("#datepicker").change(function () {
        if ($("#datepicker").val()) {
            let date = $("#datepicker").val();
            let datearray = date.split("/");
            date = datearray[2] + '-' + datearray[0] + '-' + datearray[1];
            let currentMail = document.getElementById("currentMail").textContent;
            document.querySelector("#datepicker").value = date;
            const postDate = {
                dateReserve: date,
                mail: currentMail
            };
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

    /*
     * INSERT NEW RESERVE
     */
    $("#button-reserve").click(
            function () {
                if ($("#datepicker").val()) {
                    let date = $("#datepicker").val();
//                    document.querySelector("#datepicker").value = date;
                    let currentMail = document.getElementById("currentMail").textContent;
                    let url = "../controller/BookingsC.php";
                    const postDate = {
                        dateReserve: date,
                        mail: currentMail
                    };
                    $.post(url, postDate, function (response) {


                        let confirmed = response;
                        if (confirmed == 1) {
                            alert("Day Reserved");
                            fecthBooks();
                        } else
                        {
                            alert("Day Ocupied");
                        }
                        document.querySelector("#datepicker").value = "";
                    });
                }
            }

    );
    /*
     * CANCEL BOOKING
     */
    $(document).on("click", ".reserve-delete", function () {
        if (confirm("Are you sure that you want to delete it?")) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr("class");
            $.post("../controller/BookingsC.php", {id}, function (response) {

                fecthBooks();
            });
        }
    });
    
     /*
     * PAY TAXES
     */
    $(document).on("click", "#pay-taxes", function () {
        if (confirm("Are you sure that you want to pay it?")) {
            let confirm=1;
             let currentMail = document.getElementById("currentMail").textContent;
                   
                    const postData = {
                        confirm: confirm,
                        mail: currentMail
                    };
            $.post("../controller/pendentTaxesPay.php", postData, function (response) {
                console.log(response);
                fecthPendentTaxes();
                
                
            });
            
        }
        
    });


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
                        template += `<td><button class="reserve-delete btn btn-danger m-auto"><span class="material-icons-outlined">delete</span></button></td>`;
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

    /**
     * FUNCTION VISUALIZE CANS WITH BUTTON
     */
    function fecthCans() {

        let cansList = 1;
        $.ajax({
            url: "../controller/cansC.php",
            type: "POST",
            data: {cansList},
            success: function (response) {

                let cans = JSON.parse(response);
                template = "<div class='col-12'><h2 class='d-block'>SELECT CANS</h2></div>";
                cans.forEach(can => {
                    template += ` <div class="col-10 col-md-4 col-lg-3 m-1 mt-2 cans-cards">
                                                         <div style="height:100%;" class="card cardrepeat mt-2"> 
                                                            <h5 class="card-title" align="center">Can ${can.id} || ${can.capacity} L</h5>

                                                             <div class="card-body">`;
                    if (can.using === 1) {
                        template += `<img loading="lazy" class="card-img-top img" src="images/canOcupped.png" alt="honey can"> 

                                                                    <h6 class="text-center text-danger m-0">ENDS ${can.end_date}</h6>
                                                                    <h6 class="text-center m-0 py-2">${can.mail}</h6>                                                       `;
                    } else {
                        template += ` <img loading="lazy" class="card-img-top img" src="images/can.png" alt="honey can">                         
                                           <button class="reserveCanToUse btn bg-yellow pl-5 pr-5 d-block m-auto" data-id="${can.id}">
                                                <span class="material-icons-outlined">
                                                    done_outline
                                                </span>
                                            </button>`;
                    }



                    template += ` </div></div></div>`;
                });
                $("#cans-container").html(template);
                $("#cans-container").show();
            }
        });
    }
    ;

    /**
     * FUNCTION VISUALIZE CANS WITHOUT BUTTON
     */
    function fecthCansLessButtons() {

        let cansList = 1;
        $.ajax({
            url: "../controller/cansC.php",
            type: "POST",
            data: {cansList},
            success: function (response) {

                let cans = JSON.parse(response);
                template = "<div class='col-12'><h2 class='d-block'>VIEW CANS</h2></div>";
                cans.forEach(can => {
                    template += ` <div class="col-10 col-md-4 col-lg-3 m-1  cans-cards">
                                                         <div style="height:100%;" class="card cardrepeat mt-2"> 
                                                            <h5 class="card-title" align="center">Can ${can.id} || ${can.capacity} L</h5>

                                                             <div class="card-body">`;
                    if (can.using === 1) {
                        template += `<img loading="lazy" class="card-img-top img" src="images/canOcupped.png" alt="honey can"> 

                                                                    <h6 class="text-center text-danger m-0">ENDS ${can.end_date}</h6>
                                                                    <h6 class="text-center m-0 py-2">${can.mail}</h6>                                                       `;
                    } else {
                        template += ` <img loading="lazy" class="card-img-top img" src="images/can.png" alt="honey can">`;
                    }



                    template += ` </div></div></div>`;
                });
                $("#cans-container").html(template);
                $("#cans-container").show();
            }
        });
    }
    ;
    /*
     * VISUALIZE PENDENT TAXES FUNCTION
     */
    function fecthPendentTaxes() {
        let pendentTaxes = 1;
        let currentMail = document.getElementById("currentMail").textContent;
        let url = "../controller/ProductionsC.php";
        const postDate = {
            mail: currentMail,
            pendent: pendentTaxes
        };

        $.post(url, postDate, function (response) {

            if (response) {
                let counter = 0;
                let pendentTaxes = JSON.parse(response);
                template = `<h3>Taxes</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;

                pendentTaxes.forEach(pendentTax => {
                    counter += parseFloat(pendentTax.tax);
                    template += `<tr>
                                    <td>${pendentTax.date}</td>
                                    <td>${pendentTax.tax}</td>          
                                            </tr>`;

                });
                template += `</tbody>
                                    </table>`;
                if (counter > 0) {
                    template += `  <button id="pay-taxes" class="btn btn-block bg-success" type="button">
                                        <h5>Pay Now</h5></button>
                                    <h5 align="right">TOTAL ${counter}€</h5>`;

                }


                $("#pendent-tax-table").html(template);
                $("#pendent-tax-table").show();


            }else{
                $("#pendent-tax-table").html("");
                $("#pendent-tax-table").show();
            }
        });
    }
    ;



}
);                 