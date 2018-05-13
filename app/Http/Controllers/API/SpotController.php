<?php

namespace App\Http\Controllers\API;

use App\Spot;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SpotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get all of the spots.
     *
     * @return Response
     */
    public function index()
    {
        return Spot::all();
    }

    /**
     * Create a new spot.
     *
     * @return Response
     */
    public function update(Request $request, Spot $spot)
    {
        // $this->validate($request, [
        //     'title' => 'required'
        // ]);
        $spot->update($request->all());
        return $spot;
    }

    public function store(Request $request) {

        return Spot::create($request->all());
    }
}