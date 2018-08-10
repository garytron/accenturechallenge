 $(document).ready(function(){

$('#arreglo').on('keyup keydown', function(){
    var validado = validarArray($("#arreglo").val());
    if(validado)
        {
            $("#arreglo").removeClass("feedback-error").addClass("feedback-success");
            $("#enviar").removeAttr('disabled');
        }
        else
        {
            $("#arreglo").removeClass("feedback-success").addClass("feedback-error");
            $('#enviar').attr('disabled','disabled');
        }
});
 $('#enviar').click(function(){
    	$.ajax({
        type: "POST",
        url: "apiREST/webservice.php",
        data: { arreglo: $("#arreglo").val() },
        dataType: 'json',
        success: function(output){
            console.log(output);


            $("#maximo").html(output.maximo);
            $("#minimo").html(output.minimo);
        },
        error: function(xhr, status, error){
        }
     });
});

});

function validarArray(arreglo)
{
    return (arreglo.match(/^[0-9]+(,[0-9]+)*$/))? true:false;
}