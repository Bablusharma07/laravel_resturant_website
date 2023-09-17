 
 $(document).ready(function(){

            $("#open").click(function(){
            $("#open").hide();
            $("#closed").show();
            $("#password").attr("type","text");

        });

        $("#closed").click(function(){
            $("#closed").hide();
            $("#open").show();
            $("#password").attr("type","password");

        });

    });