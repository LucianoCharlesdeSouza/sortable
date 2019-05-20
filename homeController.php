<?php
    public function sortable() {
        $dados = [];

        $Query = "SELECT * FROM usuarios ORDER BY ordem";
        $dados['lista_user'] = Usuarios::FullRead($Query);

        $this->loadTemplate("sortable/sortable", $dados);
    }

    public function ordersortable() {
        $usuarios = $_POST["usuarios"];
        $pos = 0;

        foreach ($usuarios as $users) {
            Usuarios::ordenar($pos, $users);
            $pos++;
        }
        $dados = [];

        $Query = "SELECT * FROM usuarios ORDER BY ordem";
        $u = Usuarios::FullRead($Query);

        $r = null;
        foreach ($u as $user) {
            extract($user);
            $r .= '<div class="user user' . $id . '" id="' . $id . '">' . $nome . ' Ordem [ ' . $ordem . ' ]</div>';
        }

        $dados['retorno'] = $r;

        echo json_encode($dados);
        exit();
    }
