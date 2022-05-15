
$.getJSON("https://json.geoiplookup.io/?callback=?", function (data) {
    $("#latitude").val(data.latitude);
    $("#longitude").val(data.longitude);
   // alert(data.region);        
});
$( "#ambu" ).click(function() {
    if ($('#chk').is(':checked')) {
        $("#chk").val("1");
        alert("vhh")
        
     }
     else if($('#chk').is(':not(:checked)')) {
        $("#chk").val("0");
        alert("vhvh")
     }else{

     }
    
if ($("#b")[0].selectedIndex <= 0) {
    alert("Please select");
    return false;
}else{
   
}
}); 