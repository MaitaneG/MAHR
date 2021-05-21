$(function () {
    /*
     *CALL FUNCTION VISUALIZE ACTIVE MEMBERS
     */
    fecthMembers();
    
    /*
     * VISUALIZE ACTIVE MEMBERS FUNCTION
     */
    function fecthMembers() {
        
        let fetch=1;
        let url = "../controller/membersC.php";

        $.post(url, {fetch}, function (response) {
            
            if (response) {
                
                let members = JSON.parse(response);
                template = "";
                 members.forEach(member => {
                     template+=`            
                                                <li>${member.name} ${member.surname}</li>`;
                 });
                                    

                 
                $("#members-list").html(template);
                $("#members-list").show();


            } else {
                $("#members-list").html("");
                
            }
        });
    }
    ;
    
    

    
    
});
