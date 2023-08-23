<?php
    function lifetime($start_date) {
        // Criar objetos DateTime para a data fornecida e a data atual
        $datePast = new DateTime($start_date);
        $dateNow = new DateTime();

        // Calcular a diferença entre as duas datas
        $interval = $dateNow->diff($datePast);

        // Retornar a diferença em anos, meses e dias
        return [
            'years'  => $interval->y,
            'months' => $interval->m,
            'days'   => $interval->d
        ];
    }
?>