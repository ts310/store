<script>
    $(document).ready(function(){
        var str,fields;
        function showValues() {
            str = $("form").serialize();
            $("#comments").text(str);
        }

        $(".submit").click(function (){
            alert(str);
            $.ajax({
                type: "POST",
                url:"/comments/submit"
                data: "str="+str,
                success: function(msg){
                    alert( "Data Saved: " + msg);
                }

            });
            return false;
        });//submit click
    });//document ready
</script>
