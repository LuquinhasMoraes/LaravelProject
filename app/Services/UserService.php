<?php

namespace App\Services;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class UserService {
    
     private $repository;
     private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store ($data) {

        try {

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $usuario = $this->repository->create($data);

            // dd()

            return [
                'success'   => false,
                'message'  => 'Cadastrado com sucesso.',
                'type'      => 'alert-success',
                'data'      => $data
            ];

        } catch (Exception $e) {

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
                'type'      => 'alert-danger',
                'message'   => $message
            ];
        }
    }

    public function update($request, $id)
    {
        try
        {

            $this->validator->with($request)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $this->repository->update($request, $id);

            return [
                'success'   => true,
                'message'   => 'Registro atualizado com sucesso.',
                'type'      => 'alert-success'
            ];
        }
        catch(Exception $e)
        {   
            dd($e);
        }
        
    }

    public function delete ($data) {

        try {

            $deleted = $this->repository->delete($data);

            return $deleted;

        } catch (Exception $e) {

        }
    }
}