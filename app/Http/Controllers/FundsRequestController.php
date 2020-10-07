<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FundsRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($_GET) {
            if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) )  {
                return redirect()->action( 'FundsRequestController@handleCreate')->with('session_get', $_GET );
               

            }
            else {
                echoError("НЕТ параметра", print_r($_GET));
            }
        }
    }
    /**
     *   параметры передаются ужасно - через сессию
     **/
    public function handleCreate()
    {
        if (isset(session('session_get')['email']) && filter_var(session('session_get')['email'], FILTER_VALIDATE_EMAIL) )  {
            return view('funds_request.create', ['email' => session('session_get')['email']]);
        }
        else {
            echoError("НЕТ параметра");
        }    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request1C = Request::create('http://m1c-dev1/1cdev-zup-uu/hs/funds_request/create', 'POST', $request->all() ); 

        $response1C = Http::withBasicAuth('webreader', 'webreader')->post('http://m1c-dev1/1cdev-zup-uu/hs/funds_request/create', $request->all() );

        return  $response1C->body() . $response1C->status()         ;
        // return [
        //     "result" => json_encode($request->all()),
        //     "files" => json_encode($request->allFiles())
        // ];
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
