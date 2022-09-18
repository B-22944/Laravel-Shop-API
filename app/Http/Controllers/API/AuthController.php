<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\UserRequest;


class AuthController extends Controller
{

        /*
    Making Constructor to use the private member
    All the functions/methods are called from ProductRepository
   */
        private $productRepository;

        public function __construct(ProductRepositoryInterface $productRepository){
            $this->productRepository = $productRepository;
        }

    public function register(UserRequest $request){
        
        return $this->productRepository->userRegister($request);
        
    }

    public function login(UserRequest $request){
        
        return $this->productRepository->userlogin($request);
        
    }
    
    public function userInfo(){
        return $this->productRepository->userData($request);
    }
}
