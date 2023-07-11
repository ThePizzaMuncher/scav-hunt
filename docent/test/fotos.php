<html>

<head>
    <title>Example</title>
    <style>
        body {
            background-color: black;
        }

        #afbeelding_div {
            width: 480px;
            /* (panel_height+panel_margin*2)*panels per row = (100px+(10px*2))*8 */
        }

        #afbeelding_div .afbeelding_stukjes {
            float: left;
            width: 100px;
            height: 100px;
            margin: 10px;
            background: url('../../assets/img/123.jpg') no-repeat 0 0 fixed;
        }
    </style>
</head>
<?php
$score = $conn->query("SELECT score FROM groep WHERE ID = 1");
echo "Dit is de score van groepje 1: " . $score;
?>
<body>
    <div id="afbeelding_div">
        <div>
            <div class="afbeelding_stukjes" style="visibility: hidden;"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
        </div>
        <div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
        </div>
        <div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
            <div class="afbeelding_stukjes"></div>
        </div>
    </div>
</body>

</html>