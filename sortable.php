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
    .user5{
        background-color: #ffcc00;
    }
    .user3{
        background-color: #000099;
        color: #fff;
    }

</style>
<?php
    echo '<div id="sortable">';
    if (!empty($lista_user)) {

        foreach ($lista_user as $user) {
            extract($user);
            echo '<div class="user user' . $id . '" id="' . $id . '" data-user="'.$nome.'">' . $nome . ' Ordem [ ' . $ordem . ' ]</div>';
        }
    }
    echo '</div>';
