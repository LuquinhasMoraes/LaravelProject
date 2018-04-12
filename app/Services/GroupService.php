<?php

namespace App\Services;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
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

    public function store ($data) {

        try {
            
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = $this->repository->create($data);
            dd($data);
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

}