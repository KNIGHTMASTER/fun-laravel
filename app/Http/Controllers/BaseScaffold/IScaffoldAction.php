<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 2/24/2016
 * Time: 10:54 AM
 */

namespace app\Http\Controllers\BaseScaffold;


use Illuminate\Http\Response;

interface IScaffoldAction
{

    /**
     * Store a newly created resource in storage
     *
     * @return Response
     */
    public function store();

    public function storeProcess($p_Data);

    /**
     * Update the specific resource in storage
     * @param $id
     * @return Response
     */
    public function update($id);

    /**
     * Remove the specified resources form storage
     * @param $id
     * @return Response
     */
    public function destroy($id);

}