<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyOneList - Your one list for more tasks</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
<!--     <script src="js/jquery.min.js" integrity="sha512-aVKKRRi/  Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/ckeditor.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script async defer src="js/app.js"></script>
    <script async defer src="js/text-framework.js"></script>
</head>
<body>
    <div class="app-loading">
    <style>
        .app-loading{
            display: inline-block;
            height: 60vh;
            top: 10px;
            left: 50%;
            transform: translate(-31%, 44%);
            position: relative;
            font-family: system-ui;
        }


        .notes{
            margin: 8px;
            content: " ";
            display: block;
            position: relative;
            left: 13%;
            top: 7%;
        }
        .card {
            width: 70px;
            height: 100px;
            background-color: beige;
            border: 1.5px solid gray;
        }
        .left {
            position: relative;
            top: -2px;
        }
        .left2 {
            position: relative;
            top: -1px;
            left: 1px;
            -webkit-box-shadow: 0.3px 1px 1px 0px black;
            -moz-box-shadow: 0.3px 1px 1px 0px black;
            box-shadow: 0.3px 1px 1px 0px black;
        }

        #typedtext {
            font-family: "Waiting for the Sunrise", cursive;
            font-size: 27px;
            margin: -9.2px 2px;
            letter-spacing: -5px;
            font-weight: bold;
        }

        .app-loading span {
            position: relative;
            top: 23%;
            left: -17%;
            transform: translate(0%, 34%);
            font-size: 30px;
        }

    </style>
        <div class="notes">
            <div class="card">
                <div class="card left">
                    <div class="card left2">
                        <div id="typedtext"></div>
                    </div>
                </div>
            </div>
        </div>
        <span>Preparing your notes</span>  
    <script>
        // set up text to print, each item in array is new line
        /*var aText = new Array("~~~~~~", "~~~~~~~", "~~~~~", "~~~~~~");*/
        var aText = new Array("~~~~~~", "~~~~~~~", "~~~~~");
        var iSpeed = 110; // time delay of print out
        var iIndex = 0; // start printing array at this posision
        var iArrLength = aText[0].length; // the length of the text array
        var iScrollAt = 20; // start scrolling up at this many lines

        var iTextPos = 0; // initialise text position
        var sContents = ""; // initialise contents variable
        var iRow; // initialise current row

        function typewriter() {
            sContents = " ";
            iRow = Math.max(0, iIndex - iScrollAt);
            var destination = document.getElementById("typedtext");

            while (iRow < iIndex) {
            sContents += aText[iRow++] + "<br />";
            }
            try{
                destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos);
            }
            catch(err){
            } 
            //alert(aText[iIndex].substring(0, iTextPos).length)
            if (iTextPos++ == iArrLength) {
            iTextPos = 0;
            iIndex++;
            if (iIndex != aText.length) {
                iArrLength = aText[iIndex].length;
                setTimeout("typewriter()", 500);
            }
            } else {
            setTimeout("typewriter()", iSpeed);
            }
        }

        function loadTypewriter() {
            iSpeed = 110; // time delay of print out
            iIndex = 0; // start printing array at this posision
            iArrLength = aText[0].length; // the length of the text array
            iScrollAt = 20; // start scrolling up at this many lines

            iTextPos = 0; // initialise text position
            sContents = ""; // initialise contents variable
            iRow; // initialise current row
            try{
                document.getElementById("typedtext").innerText = "";
            }
            catch{
                clearInterval(tmpLoading)
            }
            typewriter();
        }
        setTimeout(loadTypewriter, 300);
        var tmpLoading = setInterval(loadTypewriter, 3200);
    </script>
    </div>
    <div class="app" style="display: none;">
        <header class="header">
            <div class="logo">MyOneList</div>
            <div class="actions">
                <div class="theme-mode" onclick="thmchange()">
                    <i id="light" class="fa-solid fa-sun" alt="theme"></i>
                    <i id="night" class="fa-solid fa-moon"></i>
                </div>
                <div class="box user">
                    <i id="user" class="fa-solid fa-user"></i>
                    <span id="username">Username</span>
                    <i id="logout" class="fa-solid fa-arrow-right-from-bracket"></i>
                </div>
                <div class="box save">
                    <i id="user" class="fa-solid fa-plus-large"></i>
                    <span id="username" onclick="url_soon()">Save Note</span>
                </div>
            </div>
        </header>
        <section class="section">
            <div class="main">
            </div>
            <a href="#" onclick="buildnote()" class="float">
                <i class="fa fa-plus plus-float"></i>
            </a>
        </section>
    </div>
</body>
</html>