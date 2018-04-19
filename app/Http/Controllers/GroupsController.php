<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;
use App\Repositories\InstituitionRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;

/**
 * Class GroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupsController extends Controller
{

    protected $repository;
    protected $instituitionRepository;
    protected $userRepository;
    protected $validator;
    protected $service;

    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service, InstituitionRepository $instituitionRepository, UserRepository $userRepository)
    {
        $this->repository               = $repository;
        $this->userRepository           = $userRepository;
        $this->instituitionRepository   = $instituitionRepository;
        $this->validator                = $validator;
        $this->service                  = $service;
    }

    public function index()
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $groups = $this->repository->all();
        $users_list = $this->userRepository->selectBoxList();
        // dd($groups);
        return view('groups.index', ['groups' => $groups, 'users_list' => $users_list]);

    }

    public function create () {

        $groups = $this->repository->all();

        $inst_list = $this->instituitionRepository->selectBoxList();
        $user_list = $this->userRepository->selectBoxList();

        return view('groups.add', [
            'user_list'    => $user_list,
            'inst_list'     => $inst_list
        ]);
    }

    public function store(GroupCreateRequest $request)
    {
        try {

            $request = $this->service->store($request->all()); 

            session()->flash('success', [
                'success' => $request['success'],
                'message' => $request['message'],
                'type'    => $request['type']
            ]);

            return redirect()->back();
            
        } catch (Exception $e) {
            session()->flash('success', [
                'success' => $request['success'],
                'message' => $request['message'],
                'type'    => $request['type']
            ]);
        }
        
    }

    public function show($id)
    {
        $group = $this->repository->find($id);
        $users_list = $this->userRepository->selectBoxList();

        return view('groups.show', 
            [
                'group'         => $group, 
                'users_list'     => $users_list
            ]
        );
    }

    public function edit($id)
    {
        $group = $this->repository->find($id);

        return view('groups.edit', compact('group'));
    }

    public function update(GroupUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Group updated.',
                'data'    => $group->toArray(),
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

        try 
        {
            $request = $this->service->destroy($id);

            session()->flash('success', [
                'success'   => $request['success'],
                'message'   => $request['message'],
                'type'      => $request['type']    
            ]);

            return redirect()->back();

        } 
        catch (Exception $e) 
        {
            session()->flash('success', [
                'success'   => false,
                'message'   => $e->getMessage(),
                'type'      => 'alert-danger'    
            ]);
        }    
    }

    public function userStore(Request $request, $group_id) {
        $data = $this->service->userStore($request->all(), $group_id);

        session()->flash('success', [
            'success' => $data['success'],
            'message' => $data['message'],
            'type'    => $data['type'],
            'group'   => $data['users_group']
        ]);

        return redirect()->back();
    }

}
