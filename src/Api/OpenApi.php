<?php
namespace App\Api;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'Superblog', 
    version:'1.1',
    description: "Blog opensource"
)]
#[OA\Server(
    url: "http://localhost:8000",
    description: "Server de test"
)]
class OpenApi {}