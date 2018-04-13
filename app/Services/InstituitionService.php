<?php

namespace App\Services;

use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use \Prettus\Validator\Contracts\ValidatorInterface;

class InstituitionService {

    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator) {
        
        $this->repository   = $repository;
        $this->validator    = $validator;

    }

    public function store ($data) {
        
        try {
            
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $inst = $this->repository->create($data);
            // dd($inst);
            return [
                'success'   => true,
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
                'message'  => $message,
                'type'      => 'alert-danger'
            ];
        }

    }

    public function destroy($id) {
        
        try {
            
            $return = null;

            if($this->repository->delete($id)) {
                $return = [
                    'success' => true,
                    'message' => 'Deletado com sucesso!',
                    'type' => 'alert-success'
                ];
            }

            return $return;

        } catch (Exception $e) {

        }


    }

}