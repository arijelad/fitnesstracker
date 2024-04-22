<?php
require_once __DIR__ . '/rest/services/UserService.class.php';

$payload = $_REQUEST;

$params = [
    'start' => (int)$payload['start'],
    'search' => $payload['search']['value'],
    'draw' => (int)$payload['draw'],
    'limit' => (int)$payload['length'],
    'order_column' => $payload['order'][0]['email'],
    'order_direction' => $payload['order'][0]['dir'],
];

// Count query
$user_service = new UserService();
$data = $user_service=>get_users_paginated($params['start'], $params['limit'], $params['search'], $params[order_column], $params[order_direction]);


// Get data query

// Response
echo json_encode([
    'draw' => $params['draw'],
    'data' => $data['data'],
    'recordsFiltered' => $data['count'],
    'recordsTotal' => $data['count'],
    'end' => $data['count']
]);
