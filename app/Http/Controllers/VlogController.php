<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class VlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showentries = DB::table('vlogentries')->orderby('id', 'asc')->get();
        echo json_encode($showentries,JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

$Vtitle = $request->title;
$Vdesc = $request->desc;
$Vmat = $request->materials;
$Vprep = $request->preperation;
$Vintro = $request->intro;
$Voutro = $request->outro;
$Vmain = $request->main;
$Vtitles = $request->titles;
$Vcredits = $request->credits;
$Vfilmed = $request->filmed;
$Vuploaded = $request->uploaded;
$Vscheduled = $request->scheduled;
$Vtags = $request->tags;
$Vlinks = $request->links;
$Vsites = $request->sites;
$Vsocial = $request->social;
$Vseries = $request->series;
$Vno = $request->no;

$vlogentries = DB::table('vlogentries')->insert([
'title' => $Vtitle,
'description'  => $Vdesc,
'preperation' => $Vprep,
'materials' => $Vmat,
'intro' => $Vintro,
'main' => $Vmain,
'outro' => $Voutro,
'titles' => $Vtitles,
'credits' => $Vcredits,
'filmed' => $Vfilmed,
'uploaded' => $Vuploaded,
'scheduled' => $Vscheduled,
'tags' => $Vtags,
'links' => $Vlinks,
'sites' => $Vsites,
'social_media' => $Vsocial,
'series' => $Vseries,
'no' => $Vno

]);

echo json_encode($vlogentries,JSON_NUMERIC_CHECK);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
