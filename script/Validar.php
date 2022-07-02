<?php
    function validarRealizado($valorRealizado) {
        if ($valorRealizado == 0) {
            $checboxInsertar = '<input type="checkbox" name="cboxRealizado" id="cboxRealizado">';
            return $checboxInsertar;
        } elseif ($valorRealizado == 1) {
            return "Finalizado";
        }
    }
?>