<?php
/**
 * Created by PhpStorm.
 * User: ejwettstein
 * Date: 3/26/14
 * Time: 5:16 PM
 */ ?>
<html>
<head>
    <title>Deltak Demo</title>
</head>
<body>
<h1>Deltak Demo</h1>
<ul>
    <li><a href="info.php?code=en12">Engage University</a></li>
    <li><a href="info.php?code=en15">Engage University, Chicago</a></li>
</ul>
<div id="output" style="display: none;"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(
        function(){
            function click(e){

                var url = $(this).attr("href");
                if (url.length> 0) {
                    $.ajax({
                        url: url,
                        dataType: "text",
                        success: ajaxresults,
                        error: ajaxerror
                    });
                    e.preventDefault();
                }

            }

            function ajaxresults(data) {
                $("#output").html("<pre>"+data+"</pre>").show();
            }

            function ajaxerror(){
                $("#output").html("<em>Error</em>").show();

            }

            $("li a").on("click", click);


    });

</script>
</body>
</html>