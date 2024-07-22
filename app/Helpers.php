<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Formata o número de telefone para o padrão (99) 99999-9999 ou (99) 9999-9999
        if (strlen($phoneNumber) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phoneNumber);
        } elseif (strlen($phoneNumber) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $phoneNumber);
        }

        return $phoneNumber;
    }
}

if(!function_exists('formatNumber')){
    function formatNumber($number)
    {
        return number_format($number, 2, ',', '.');
    }
}
