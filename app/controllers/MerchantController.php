<?php

class MerchantController extends ApiController
{
    public function index()
    {
        $products = Merchant::take(10)->get();
        return $this->respondArray($products);
    }

    public function show($id)
    {
        $product = Merchant::find($id);
        return $this->respondItem($product);
    }
   

    public function create()
    {
    	// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
		    'name'         => 'required',
		    'website'          => 'url'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		    return $this->errorWrongArgs( $validator->messages()->toArray()  );

		} else {
		    
			$product = Product::create( 
                array(
                'SKU'          => Input::get('name'),
                'url'  => Input::get('website')
                )
            );
			// return the product data
            return $this->respondItem($product);

		}
    }

    public function transform($item)
    {
    	return array (
    		'merchant_id'   => $item->id ,
    		'name'          => $item->name , 
			'website'       => $item->url 
    	);
    }

}
