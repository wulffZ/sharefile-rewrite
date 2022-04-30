<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.progress');
            var percent = $('.percent');
            $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.attr("value", percentVal)
                    percent.attr("value", percentVal)
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.attr("value", percentComplete)
                    percent.html(percentVal);
                },
            });
        });
    });
</script>
