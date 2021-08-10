<?php

namespace App\Http\Traits;
use App\Models\User;
use Illuminate\Http\Request;


trait UserTrait {
    
    #   Create a new user
    public function createUserFromHome($request) { 
        
        $user = User::create([
            'name'           => $request['name'], 
            'email'          => $request['email'],
            'password'       => bcrypt($this->generatePassWord($request)),
            'active'         => false,
            'is_admin'       => false,
            'is_partner'     => true,
            'is_deliveryman' => false,
        ]);
                   
        return $user;
    }

    #   ONLY FOR TESTS
    private function generatePassWord($request){
        $password = '';
        
        if ($request) {
            $email    = strstr($request['email'], '@', true);
            $tax      = substr($request['tax_number'], -3  );
            $password = $email . $tax . '@iGO';
        }

        return $password;
    }
    
    
}