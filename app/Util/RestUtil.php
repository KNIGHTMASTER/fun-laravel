<?php
/**
 * @package App\Util
 * @since 12/30/2016 - 1:01 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Util;

class RestUtil {    
    protected $jsonSerializer;

    function getJsonSerializer() {
        $this->jsonSerializer = new CleanJsonSerializer();
        return $this->jsonSerializer;
    }

    function escapeJsonString($value) {
        # list from www.json.org: (\b backspace, \f formfeed)    
        $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
        $replacements = array("");
        $result = str_replace($escapers, $replacements, $value);
        return $result;
    }
    
    function getJsonData($data){
        $var = get_object_vars($data);
        foreach($var as &$value){
           if(is_object($value) && method_exists($value,'getJsonData')){
              $value = $value->getJsonData();
           }
        }
        return $var;
    }
}
