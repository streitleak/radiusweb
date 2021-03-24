$( document ).ready( function() {
    $('table tbody tr').each(function() { 
        $(this).on('click', function() {
            $('#detail_show').css({"top" : ($(this).offset().top + 50), "left" : ($(this).offset().left + 20)});
            //alert("Top=" + ($(this).offset().top +50) + " Left=" + ($(this).offset().left +20));
            $('#detail_show').html($(this).find('#cdrdetail').html()).show();                    

        });
    });
    $('#detail_show').on('click',function() {    
            $(this).show();
    });

    $('#starttime').datetimepicker({
        "dateFormat": "yy-mm-dd",
        "timeFormat": "HH:mm:ss"
    });
    $('#stoptime').datetimepicker({
        "dateFormat": "yy-mm-dd",
        "timeFormat": "HH:mm:ss"
    });
    $('table tfoot .links a').on('click',function(e) {
        e.preventDefault(); // cancel the link itself
        $('#search').attr('action',this.href);        
        $('#search').submit();
      });
    $('#search #reset').on('click',function() {
        $('#starttime').attr('value','');
        $('#stoptime').attr('value','');
        $('#calling').attr('value','');
        $('#called').attr('value','');
        $('#duration').prop('checked',false);
    });
});