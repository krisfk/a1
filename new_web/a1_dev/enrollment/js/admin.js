$(function() {

	$('.checkbox_all').change(function (e) {
		var control = $(this).attr('control');
		$('.'+control).prop("checked", $(this).prop("checked"));
	});

	$("#start_time" ).datetimepicker();
	
	$("#end_time" ).datetimepicker();
	
	$('#btn_del').click(function() {
	  if(confirm('確定要刪除?')){
		$('#submit_type').val(2);
		$('form').submit();
	  }
	});

	$('#fileupload').fileupload({
        url: 'index.php/fileupload/',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#pay_email_attach').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});