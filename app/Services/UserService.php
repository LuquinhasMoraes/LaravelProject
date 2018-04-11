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

            $usuario = $this->repository->create($data);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

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

    public function delete ($data) {

        try {

            $deleted = $this->repository->delete($data);

            return $deleted;

        } catch (Exception $e) {

        }
    }
}