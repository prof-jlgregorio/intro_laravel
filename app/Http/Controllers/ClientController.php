<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ClientController extends Controller
{

    //..store clients temporary
    private $clients = [];

    public function __construct()
    {
        //..mock a set of fixed clients
        $this->createClients();


        if(!session('clients')){
            session(['clients' => $this->clients]);
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return the view - using the view name
        return view('client.index')->with('clients', $this->clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $clients = session('clients');
        $lastId = 0; 
        if ($clients) { 
            $lastIndex = count($clients) - 1;
            $lastId = $clients[$lastIndex]->id;
        }
        $c = new stdClass; 
        $c->id = $lastId + 1; 
        //..get the data from request
        $c->name = $request->input('name'); 
        $c->city = $request->input('city'); 
        $c->email = $request->input('email'); 
        $clients[] = $c; 

        session(['clients' => $clients]);

        return view('client.index')->with('clients', $clients);
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

    //..create a set of mocked clients
    private function createClients()
    {
        //..creates a new stdclass
        $client = new stdClass;

        //..create a new object
        $client->id = 1;
        $client->name = 'Mikasa Ackerman';
        $client->city = 'Paradis';
        $client->email = 'mikasa@paradis.com';

        //..store the new object in private attribute 'client'
        $this->clients[] = $client;


        //..creates a new stdclass
        $client = new stdClass;

        //..create a new object
        $client->id = 2;
        $client->name = 'Eren Yeager';
        $client->city = 'Paradis';
        $client->email = 'vomatatodomundo@paradis.com';

        //..store the new object in private attribute 'client'
        $this->clients[] = $client;
    }


    //..returns an object from an array
    private function arrayFind($array, $id)
    {
        if ($array) {
            foreach ($array as $obj) {
                if ($obj->id == $id)
                    return $obj;
            }
            return null;
        }
    }

    //..return the index of an array in an object
    private function arraySearch($array, $key, $search)
    {
        if ($array) {
            $i = 0;
            foreach ($array as $obj) {
                if ($obj->$key == $search) {
                    return $i;
                }
                $i++;
            }
            return -1;
        }
    }
}
