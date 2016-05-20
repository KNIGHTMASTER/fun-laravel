<?php
/**
 * @package App\Dto\Response
 * @since 1/12/2016 - 11:15 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Dto\Response;

class BaseResponseDto {

    public $statusCode;

    public $message;

    public $description;
    
    function getStatusCode() {
        return $this->statusCode;
    }

    function getMessage() {
        return $this->message;
    }

    function getDescription() {
        return $this->description;
    }

    function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setDescription($description) {
        $this->description = $description;
    }
}
