<?php

namespace App\Services;

use App\Repositories\JobTypeRepository;
use App\Repositories\OrderDetailRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderDetailService
{
    protected $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function saveData($data)
    {
        // $validator = Validator::make($data,
        //     [
        //         'name'  => 'bail|required|min:5',
        //     ]
        // );

        // if ($validator->fails()) {
        //     throw new InvalidArgumentException($validator->errors()->first());
        // }

        $result = $this->orderDetailRepository->save($data);
        return $result;
    }
}
