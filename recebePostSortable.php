<?php

        require_once('conexao.php');

        /**
         * Recupero todos os id's dos elementos
         */
        $usersIds = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $order = (int) 0;

        /**
         * Preparo o UPDATE para alterar a ordem 
         */
        $sql = "UPDATE users SET user_order = :order WHERE user_id = :id";
        $stmt = $pdo->prepare($sql);

        foreach ($usersIds['id_users'] as $key => $value) {
            $stmt->bindValue(':order', $order);
            $stmt->bindValue(':id', $value);
            $stmt->execute();
            $order++;
        }
        

        /**
         * Retorno os dados agora ja ordenados
         */
        $sql = "SELECT * FROM users ORDER BY user_order";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $list_users = $stmt->fetchAll();

        $return = '';
        foreach ($list_users as $get) {
            $return .= "<div class='user user{$get->user_id}' id='{$get->user_id}' data-user='{$get->user_name}'>{$get->user_name} Ordem [ '{$get->user_order} ']</div>";
        }

        $data = [];
        $data['return'] = $return;

        /**
         * Retorno um json para o succes do Ajax
         */
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();