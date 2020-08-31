<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="dvImage" style="height: 308px; width: 410px">
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        var images = ["iron-man.jpg", "thor-ragnarok.jpg", "iron-man-2.jpeg", "Iron_Man_3.jpg", "Avengers_Endgame.jpg", "captain_america_civil_war.jpg", "Guardians_of_the_Galaxy_poster.jpg"];
        $(function () {
            var i = 0;
            $("#dvImage").css("background-image", "url(images/posts/" + images[i] + ")");
            setInterval(function () {
                i++;
                if (i == images.length) {
                    i = 0;
                }
                $("#dvImage").fadeOut("slow", function () {
                    $(this).css("background-image", "url(images/posts/" + images[i] + ")");
                    $(this).fadeIn("slow");
                });
            }, 100);
        });
    </script>
</body>
</html>