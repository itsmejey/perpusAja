<?php
function getStatus($status){
    switch ($status) {
        case '1':
            $label = '<span class="badge text-bg-danger">Sedang Dipinjam</span>';
            break;
            case '2':
                $label = '<span class="badge text-bg-success">Sudah Dikembalikan</span>';
                break;
        
        default:
            $label = "";
            break;
    }
    return $label;
}