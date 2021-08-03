<?php

namespace App\Http\Controllers\Api;

use App\RealState;
use App\Api\ApiMessages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\RealStateRepository;

class RealStateSearchController extends Controller
{
    private $realState;

    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$realState = $this->realState->paginate(10);
        $repository = new RealStateRepository($this->realState);

        if($request->has('conditions'))
        {
            $repository->selectConditions($request->get('conditions'));
        }
        if($request->has('fields'))
        {
            $repository->selectFilter($request->get('fields'));
        }

        $repository->setLocation($request->all(['state', 'city']));

        return response()->json([
            //'data' => $realState
            'data' => $repository->getResult()->paginate(10),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $realState = $this->realState->with('address')->with('photos')->findOrFail($id);

            return response()->json([
                'data' => $realState,
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
