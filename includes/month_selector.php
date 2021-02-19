<script>
    var dateObj = new Date();
    var m = dateObj.getMonth();

    $(document).ready(function(){
        $("#month").val(m+1);
        $("#month").change(function(){
            var getMonth = $(this).val();
            $.ajax({
                url: 'includes/data_output.php',
                type: 'POST',
                data: {month:getMonth},
                success: function(data){
                    $("#progress-graph").html(data);
                    console.log(data);
                }
            });
        });
    });
</script>