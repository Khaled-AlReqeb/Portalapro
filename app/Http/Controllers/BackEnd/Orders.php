<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Hash;




class Orders extends BackEndController
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }


}
