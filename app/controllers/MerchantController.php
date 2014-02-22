<?php

class MerchantController extends ApiController
{
    public function index()
    {
        $merchant = Merchant::take(10)->get();
        return $this->respondArray($merchant);
    }

    public function show($id)
    {
        $merchant = Merchant::find($id);
        return $this->respondItem($merchant);
    }
   

    public function create()
    {
    	// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
		    'name'         => 'required',
		    'website'      => 'required',
            'email'      => 'required|email|unique:merchant' // validate required and that the string is an email

		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		    return $this->errorWrongArgs( $validator->messages()->toArray()  );

		} else {
		    
			$merchant = Merchant::create( 
                array(
                'name'  => Input::get('name'),
                'url'   => Input::get('website'),
                'email' => Input::get('email')

                )
            );
			// return the merchant data
            return $this->respondItem($merchant);

		}
    }

    public function transform($item)
    {
    	return array (
    		'merchant_id'   => $item->id ,
    		'name'          => $item->name , 
			'website'       => $item->url,
            'email'         => $item->email  
    	);
    }

}
