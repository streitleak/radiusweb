$( document ).ready( function() {
    $('#content #cdrs table tbody tr').each(function() { 
        $(this).on('click', function() {
			var detail_top = $('#detail_show').offset().top - 40;
			var detail_left = $('#detail_show').offset().left - 20;
            if($('#detail_show').is(':visible') && detail_top == $(this).offset().top && detail_left == $(this).offset().left )
			{
				$('#detail_show').hide();
			}
			else
			{
				$('#detail_show').css({"top" : ($(this).offset().top + 40), "left" : ($(this).offset().left + 20)});
				//alert("Top=" + ($(this).offset().top +50) + " Left=" + ($(this).offset().left +20));
				$('#detail_show').html($(this).find('#cdrdetail').html()).show();                    
			}
        });
    });
    $('#detail_show').on('click',function() {    
            $(this).hide();
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