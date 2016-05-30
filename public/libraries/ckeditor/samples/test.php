<?php
    if(isset($_POST['html']))
    {
        Debug::var_display($_POST['html']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script type="text/javascript" src="../jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="../ckeditor.js"></script>
<!--         <script type="text/javascript" src="../adapters/jquery.js"></script> -->
        <script>
            $(document).ready(function()
            {
                // On peut définir le WYZIWIG en appliquant à la zone de texte le plugin CKEditor avec les paramètres par defaut; 
                //$('#editor1').ckeditor();
                //CKEDITOR.replace( 'editor1' ); //idem
                
                //Changement du style d'affichage de ckeditor
                CKEDITOR.config.skin = 'office2013'; //Thème
                CKEDITOR.config.contentsCss = ['../contents.css', '../style_editeur.css']; //Style dans l'éditeur
            });
        </script>
    <style>
    #myeditor
    {
        margin-top: 20px;
        margin-left : auto;
        margin-right : auto;
        width: 800px;
    }

    h2
    {
        color : blue;
    }
    </style>
    </head>
    <body>
        <div id=myeditor>
            <form action="test.php" method="post">

                <!-- On peut définir le WYZIWIG en lui donnant la classe "ckeditor" -->
                <textarea class="ckeditor" name="html" id="editor1" rows="10" cols="80">
                    <?php 
                        if(isset($_POST['html']))
                            echo $_POST['html'];
                        else
                            echo "Voici ma zone de texte, remplacé par CK Editor";
                     ?>
                </textarea>
                <button> Envoyer</button>
            </form>
        </div>
    </body>
</html>