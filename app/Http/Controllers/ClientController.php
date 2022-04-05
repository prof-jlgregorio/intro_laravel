<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use stdClass;

class ClientController extends Controller
{

    //..store clients temporary
    private $clients = [];

    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return the view - using the view name
        //return view('client.index')->with('clients', session('clients'));

        //$clients = Client::all();
        $clients = Client::orderBy('name')->get();

        return view('client.index')->with('clients', $clients);

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
        $client = new Client();

        $client->name = $request->input('name');
        $client->city = $request->input('city');
        $client->email = $request->input('email');
        $client->save();

        return(redirect(route('client.index')));
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //..retrieve data from database - class Client uses static method find
       $client = Client::find($id);
       //..if $client is not null, then...
       if($client){
           //..return the view 'client.show' passing the retrieved object 
           return view('client.show')->with('client', $client);
       } else {
           //..else, show the error 404 page
           abort(404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //..retrieve data from database - class Client uses static method find
       $client = Client::find($id);
       //..if $client is not null, then...
       if($client){
           //..return the view 'client.edit' passing the retrieved object 
           return view('client.edit')->with('client', $client);
       } else {
           //..else, show the error 404 page
           abort(404);
       }
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
        //..retrieve the client object from database
        $client = Client::find($id);

        //..set the new values with the incoming data from client request
        $client->name = $request->input('name');
        $client->city = $request->input('city');
        $client->email = $request->input('email');
        //..update the object
        $client->save();
        //..return to index page
        return(redirect(route('client.index')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..retrieve the client object from database
        $client = Client::find($id);
        //..call the delete method
        $client->delete();

        //..aternative method to delete without use the find method
        //Client::destroy($id);

        return(redirect(route('client.index')));

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
