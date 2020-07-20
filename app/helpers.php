<?php

function success_response($data, $message='') {
    return [
        'success' => true,
        'data' => $data,
        'errors' => null,
        'message'=> $message
    ];
}

function error_response($errors, $message='') {
    return [
        'success' => false,
        'data' => null,
        'errors' => $errors,
        'message'=> $message
    ];
}
