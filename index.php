<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        #sortable{
            margin: auto;
            width: 250px;
            height: 290px;
            border: 3px dashed #ccc;
            background-color: #f3f3f3;
            padding: 10px;
        }
        .user{
            border: 1px solid #f3f3f3;
            border-radius: 10px;
            width: 200px;
            height: 80px;
            text-align: center;
            line-height: 80px;
            margin: auto;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .user select{
            border: 5px dotted red;
        }
        .user1{
            background-color: #006a00;
            color: #fff;
        }
        .user2{
            background-color: #ffcc00;
        }
        .user3{
            background-color: #000099;
            color: #fff;
        }

    </style>
</head>
<body>
<?php
    require_once('conexao.php');

    /**
     * Retorno os dados agora ja ordenados
     */
    $sql = "SELECT * FROM users ORDER BY user_order";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $list_user = $stmt->fetchAll();

    /**
     * Nessa div sera retornado os elementos ja ordenados
     */
    echo '<div id="sortable">';
    if (!empty($list_user)) {

        foreach ($list_user as $get) {
            echo "<div class='user user{$get->user_id}' id='{$get->user_id}' data-user='{$get->user_name}'>{$get->user_name} Ordem [ '{$get->user_order} ']</div>";
        }
    }
    echo '</div>';
?>  
    <script src="script.js"></script>  
</body>
</html>