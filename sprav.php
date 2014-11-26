<!DOCTYPE html>
<html>
<head>
    <title>Справочник</title>
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/config.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="bsp">
<div class="dark">
<img src="loading.gif" width="200" >
</div>

   <a href="main.html">
           <img class='home1' src="images/home.png">
         </a>

    <span class="titlesp">
        Справочник
    </span>
    <div class="col1">

        <div class="spravContainer">
            <?php
			include 'genSpTable.php';
            ?>
        </div>

        <a class="addButton btn">Add</a>
    </div>
    <div class="col2">
        <form action="editor.php" method="post" class="editForm">
        <div class="edit">
            <h3 id="title5"></h3>
            <table class="editTable hidden">
                <tr>
                    <th class="colTitle">Title</th>
                    <th class="colDescr">Description</th>
                    <th class="colEnc">Enc.type.</th>
                </tr>
                <tr>
                    <td class="colTitle">
                        <input type="text" name="title"/>
                    </td>
                    <td class="colDescr">
                        <input type="text" name="descr"/>
                    </td>
                    <td class="colEnc">
                        <input type="text" name="enctype"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a class="btn okButton">OK</a>
                    </td>
                </tr>
                <tr class="hidden">
                    <td colspan="3">
                        <input type="hidden" name="action"/>
                        <input type="hidden" name="itemId"/>
                    </td>
                </tr>
            </table>
          </div>
        </form>
    </div>

</body>
</html>