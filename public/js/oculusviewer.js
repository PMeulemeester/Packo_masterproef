/**
 * Created by pieterm on 16/02/15.
 */
var now;

$(document).ready(function(){
    //update
    $("#waiting").hide();
    next_update_timer();

    now=new Date();

    var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

        $('#datepicker').datepicker({
            // Consistent format with the HTML5 picker
            dateFormat: 'dd M yy',
            onSelect: function(d,i){
                if(d !== i.lastVal){
                    now=new Date(d);
                    $("#oculustable tr").remove();
                    $(this).change();
                }
            }
        });
    $("#panelchecker").change(function(){
        if($(this).prop("checked")==true)
            $("#detailpanel").show(1000);
        else{
            $("#detailpanel").hide(1000);
        }

    });
    $("#datepicker").val(now.getDate()+" "+monthNames[now.getMonth()]+" "+now.getFullYear());
    $(document).ajaxStart(function(){
        $("#oculusviewer").css("background",'url("/packo_masterproef/public/img/720.GIF") no-repeat center center');
        $("button").prop("disabled",true);
        $("#datepicker").prop("disabled",true);
    });
    $(document).ajaxStop(function(){
       $("#oculusviewer").css("background","");
        $("button").prop("disabled",false);
        $("#datepicker").prop("disabled",false);
    });
    callData(now);
    $("#prevdate").click(function(){
        $("#oculustable tr").remove();
       now.setDate(now.getDate()-1);
       //$("#date").text(now.getDate()+" "+monthNames[now.getMonth()]+" "+now.getFullYear());
        $("#datepicker").val(now.getDate()+" "+monthNames[now.getMonth()]+" "+now.getFullYear());
        $("#datepicker").change();
    });
    $("#nextdate").click(function(){
        $("#oculustable tr").remove();
        now.setDate(now.getDate()+1);
        //$("#date").text(now.getDate()+" "+monthNames[now.getMonth()]+" "+now.getFullYear());
        $("#datepicker").val(now.getDate()+" "+monthNames[now.getMonth()]+" "+now.getFullYear());
        $("#datepicker").change();
    });
    $("#datepicker").change(function() {
        callData(now);
    });

});
function getNow(){
    return now;
}
function next_update_timer(){
    var uid=$("#oculustable").attr("userid");
    var tid=$("#oculustable").attr("tankid");
    $("#cdtimer").children('div').remove();
    $.ajax({
        type:"GET",
        url:"http://localhost:8888/packo_masterproef/public/post_timer",
        data:{userid:uid,tankid:tid},
        dataType:"text"
    })
        .done(function(response) {
            if(response>0) {
                $("#waiting").css("display", "none");
                $("#waiting").hide();
                $("#cdtimer").append("<div id='CountDownTimer' data-timer='" + response + "' style='height: 100px'></div>");
                $("#CountDownTimer").TimeCircles({
                    count_past_zero: false,
                    time: {Days: {show: false}, Hours: {show: false}}
                });
            }else{
                if($("#waiting").is(":visible")==false) {
                    $("#waiting").css("display", "show");
                    $("#waiting").show();
                }
                //next_update_timer();
            }
        })
        .fail(function(xhr,textStatus,error) {
            alert( error );
        });

}
function callData(now){
    $("#oculustable tr").remove();
    var uid=$("#oculustable").attr("userid");
    var tid=$("#oculustable").attr("tankid");
    $.ajax({
        type:"GET",
        url:"http://localhost:8888/packo_masterproef/public/post",
        data:{filename:getFilename(now),userid:uid,tankid:tid},
        dataType:"json"
    })
        .done(function(response) {
            $("#oculustable tr").remove();
            $.each(response, function (key,val) {
                var rij;
                if (key == "error") {
                    rij="<tr><td><h2>"+val+"</h2></td></tr>"
                } else {
                    rij = "<tr>";
                    $.each(response[key], function (k, v) {
                        rij += "<td>" + v + "</td>";
                    })
                    rij += "</tr>";
                }
                $("#oculustable").append(rij);
            })
        })
        .fail(function(xhr,textStatus,error) {
            alert( error );
        });
}
function getFilename(nowDate){
    var day=nowDate.getDate();
    if(day<10){
        day="0"+day;
    }
    return String(nowDate.getFullYear()).substr(2,2)+setMonth(nowDate.getMonth())+day+".bin";
}
function setMonth(month){
    month++;
    if(month<10){
        month="0"+month;
    }
    return month;
}