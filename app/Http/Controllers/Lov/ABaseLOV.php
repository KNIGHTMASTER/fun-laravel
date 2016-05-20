<?php
/**
 * @package App\Http\Controllers\Lov
 * @since 4/19/2016 - 5:43 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers\Lov;

abstract class ABaseLOV implements ILOV
{
    public function generateLOV()
    {
        $data = $this->populateData();
        $result = collect();
        foreach ($data as $item)
        {
            $result[$item->id] = $item->name;
        }
        $result->prepend(null, null);
        return $result;
    }

    public function getValue($p_Key)
    {
        $data = $this->generateLOV();
        return $data->get($p_Key);
    }

    public function getKey($p_Value)
    {
        $data = collect($this->generateLOV());
        return $data->has($p_Value);
    }


}