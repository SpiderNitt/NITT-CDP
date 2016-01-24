<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

class AppResponse extends Response {
    public function unauthorized() {
        return $this->setStatusCode(401);
    }

    public function forbidden() {
        return $this->setStatusCode(403);
    }

    public function notFound() {
        return $this->setStatusCode(404);
    }

    public function internalError() {
        return $this->setStatusCode(500);
    }
}
