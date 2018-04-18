<?php

namespace App\Services;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Services\Request;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class GroupService {

    private $repository;
    private $validator;

    public function __construct( GroupRepository $repository, GroupValidator $validator ) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function userStore($request, $group_id) {

        try 
        {
            $group = $this->repository->find($group_id);
            $user_id = $request['user_id'];

            $group->users()->attach($user_id);


            return [
                'success'   => true,
                'message'   => 'Integrante adicionado com sucesso',
                'type'      =>  'alert-success',
                'users_group' => $group->users
            ];


        } 
        catch (Exception $e)
        {

            dd($e);
            $message = null;

            switch (get_class($e)) {

                case QueryException::class:
                        $message = $e->getMessage();
                    break;
                
                case ValidatorException::class:
                        $message = $e->getMessageBag();
                    break;

                case Exception::class:
                        $message = $e->getMessage();
                    break;
                
                default:
                        $message = $e->getMessage();
                    break;
            }

            return [
                'success'   => false,
                'message'  => $message,
                'type'      => 'alert-danger'
            ];
        }

    }

    public function store ($data) {

        try {
            
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = $this->repository->create($data);
            
            return [
                'success' => true,
                'message' => 'Cadastrado com sucesso',
                'type'    => 'alert-success'  
            ];

        } catch (Exception $e ) {

            $message = null;

            switch (get_class($e)) {

                case QueryException::class:
                        $message = $e->getMessage();
                    break;
                
                case ValidatorException::class:
                        $message = $e->getMessageBag();
                    break;

                case Exception::class:
                        $message = $e->getMessage();
                    break;
                
                default:
                        $message = $e->getMessage();
                    break;
            }

            return [
                'success'   => false,
                'message'  => $message,
                'type'      => 'alert-danger'
            ];

        }

    }

    public function destroy($id) {

        try {

            return $this->repository->delete($id);

        } catch (Exception $e) {
            return [
                'success' => false,
                'message'   => $e->getMessage(),
                'type'      => 'alert-danger'
            ];
        }


    }

}