<?php

namespace App\Http\Traits;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


trait ImagesTrait {
        
    # Upload partner cover image in database
    public function UpdatePartnerCoverImage($request) 
    {
    
        $image = $request->file('image_cover');
        $destinationPath = 'storage/storage/images/partner/' . Auth::user()->partner->id . '/';
        $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $imgName);
        $image_cover = $imgName;
        
        $newPartnerImages = Image::updateOrCreate([
            'partner_id' => Auth::user()->partner->id,
        ],['image_cover' => $image_cover]);
        
        return $newPartnerImages;   
        
    }

    # Upload partner images and update in database
    public function UploadPartnerImage($request) 
    {
        $imagesTypes = [
            'cover', '01', '02', '03',
        ];
        
        $i = 0;

        $partnerImages = [
            'partner_id'  => Auth::user()->partner->id,
        ];

        foreach ($imagesTypes as $imgType) {
            if ($image = $request->file('image-'.$imgType)) {
                $destinationPath = 'storage/storage/images/partner/' . Auth::user()->partner->id . '/';
                $imgName = date('YmdHis') . $i . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imgName);

                $partnerImages["image_$imgType"] = $imgName;

                $i++;    
            }
        }
        
        $newPartnerImages = Image::updateOrCreate([
            'partner_id' => Auth::user()->partner->id,
        ], $partnerImages);
        
        return $newPartnerImages;
        
    }

    # Upload image and return the name
    public function UploadProductImage($request) 
    {

        $partner_id  = Auth::user()->partner->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'storage/storage/images/partner/'. $partner_id .'/products' ;
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);
            
            return $imgName;
        }
        
        return false;
    }
}