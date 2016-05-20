<?php
/**
 * @package App\Dto\Response
 * @since 1/12/2016 - 11:15 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Dto\Response;

class GenericResponseDto extends BaseResponseDto{
    
    public $data;
    
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }


}
