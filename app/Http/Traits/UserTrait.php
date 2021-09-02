<?php

namespace App\Http\Traits;
use App\Models\User;
use Illuminate\Http\Request;


trait UserTrait {
    
    #   Create a new user
    public function createUser($request) { 

        $user = User::create([
            'name'           => $request['name'], 
            'email'          => $request['email'],
            'password'       => bcrypt($this->generatePassWord($request)),
            'active'         => false,
            'is_admin'       => false,
            'is_partner'     => count($request) == 10 ? true : false,
            'is_deliveryman' => count($request) == 3  ? true : false,
        ]);
                   
        return $user;
    }

    #   ONLY FOR TESTS
    private function generatePassWord($request){
        $password = '';
        
        if ($request) {
            $email    = strstr($request['email'], '@', true);
            $phone    = substr($request['mobile_phone_number'], -3  );
            $password = $email . $phone . '@iGO';
        }

        return $password;
    }
    
    
}