<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;

class UsersController extends Controller
{

    protected $service;
    protected $repository;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $service)
    {
        $this->repository   = $repository;
        $this->service      = $service;
    }

    public function index()
    {

        $users = $this->repository->all();

        return view('user.lista', [
            'users' => $users
        ]);
    }

    public function create () {
        return view('user.index');
    }


    public function store(UserCreateRequest $request)
    {
        
        $request = $this->service->store($request->all());

        $usuario = $request['success'] ? $request['data'] : null; 

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message'],
            'type' => $request['type'],
        ]);

        if($request['success'])
            $usuario = $request['data'];
        else
            $usuario = null;


        return view('user.index', [
            'usuario' => $usuario
        ]);
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
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
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
        $user = $this->repository->find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
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
 
    public function destroy($id)
    {
        try {

            $deleted = $this->service->delete($id);

            if($deleted) {
                session()->flash('success', [
                    'message' => "Usuário Deletado",
                    'type' => 'alert-success',
                ]);
            } else {
                session()->flash('danger', [
                    'message' => "ERRO",
                    'type' => 'alert-danger',
                ]);
            }

            return redirect()->back();

        } catch (\Exception $e ) {

        }
    }
}
