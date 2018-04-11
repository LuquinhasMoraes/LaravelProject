<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstituitionCreateRequest;
use App\Http\Requests\InstituitionUpdateRequest;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use App\Services\InstituitionService;

/**
 * Class InstituitionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstituitionsController extends Controller
{
    /**
     * @var InstituitionRepository
     */
    protected $repository;

    /**
     * @var InstituitionValidator
     */
    protected $validator;

    /**
     * @var InstituitionService
     */
    protected $service;

    /**
     * InstituitionsController constructor.
     *
     * @param InstituitionRepository $repository
     * @param InstituitionValidator $validator
     */
    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator, InstituitionService $service)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
        $this->service      = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituitions = $this->repository->all();

        return view('instituitions.add', [
            'instituitions' => $instituitions
        ]);

    }

    public function create()
    {
        
        return view('instituitions.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InstituitionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(InstituitionCreateRequest $request)
    {

        try {


            $request = $this->service->store($request->all());
            
            if($request) {
                $message = json_decode($request['message']);
                // var_dump($message->name[0]); exit;
                session()->flash('success', [
                    'success' => $request['success'],
                    'message' => $message->name[0],
                    'type' => $request['type'],
                ]);

                return redirect()->back();

            }


        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instituition = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instituition,
            ]);
        }

        return view('instituitions.show', compact('instituition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.edit', compact('instituition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstituitionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(InstituitionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $instituition = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Instituition updated.',
                'data'    => $instituition->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->service->destroy($id);

        if ($request['success']) {

            session()->flash('success', [
                'message' => $request['message'],
                'type'    => $request['type'],
            ]); 
                
        } else {

            session()->flash('success', [
                'message' => $request['message'],
                'type'    => $request['type'],
            ]); 

        }

        return redirect()->back();
    }
}
