<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 2/24/2016
 * Time: 10:54 AM
 */

namespace app\Http\Controllers\BaseScaffold;


use Illuminate\Http\Response;

interface IScaffoldView
{

    public function getPageTitle();

    public function getPageSubTitle();

    public function getEntityName();

    public function getColumnHeaders();

    public function getDatabaseFields();

    public function getSortableFields();

    public function getIndexPage();

    public function getShowPage();

    public function getCreatePage();

    public function getEditPage();

    /**
     * Display listing of resources
     *
     * @return Response
     */
    public function index();


    /**
     * Show the form for creating new resource
     *
     * @return Response
     */
    public function create();

    /**
     * Search data from requested selection
     *
     * @return Response
     */
    public function search($p_SearchField, $p_SearchKey);


    /**
     * Display specific resources
     *
     * @param $id for Model
     * @return Response
     */
    public function show($id);


    /**
     * Show the form for editing the specific resource
     * @param $id
     * @return Response
     */
    public function edit($id);

}