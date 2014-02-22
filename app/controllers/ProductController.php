<?php

class ProductController extends ApiController
{
    public function index()
    {
        $products = Product::take(10)->get();
        return $this->respondArray($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $this->respondItem($product);
    }

    public function save($id)
    {
    	// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'         => 'required',
			'description'  => 'required',
			'price'        => 'required|numeric',
			'merchant'     => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return $this->errorWrongArgs( $validator->messages()->toArray()  );
				
		} else {
			$product = Product::find( $id );
		   
            $product->seller_name  = Input::get('merchant');
            $product->title       = Input::get('name');
            $product->description = Input::get('description');
            $product->price       = Input::get('price');
            
            $product->save();
            return $this->respondItem($product);
        }
    }

    public function create()
    {
    	// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
		    'name'         => 'required',
		    'SKU'          => 'required',
		    'description'  => 'required',
		    'price'        => 'required|numeric',
		    'merchant'     => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		    return $this->errorWrongArgs( $validator->messages()->toArray()  );

		} else {
		    // Time to check if the SKU doesnt exist
		    $count = Product::where('SKU', '=', Input::get('SKU'))->count();

	 	    if ( $count == 1 ) // it does, throw the user out
			    return $this->errorWrongArgs( "SKU already exists !!!"  );

		
			$product = Product::create( 
                array(
                'SKU'          => Input::get('SKU'),
                'seller_name'  => Input::get('merchant'),
                'title'        => Input::get('name'),
                'description'  => Input::get('description'),
                'price'        => Input::get('price')
                )
            );
			// return the product data
            return $this->respondItem($product);

		}
    }

	public function remove($id)
    {
    	
    	$product = Product::find( $id);
		$product->delete();
		return $this->respondItem("success");
    }

    public function transform($item)
    {
    	return array (
    		'product_id'   => $item->id ,
    		'title'        => $item->name , // name is denoted as title to the outside world
			'SKU'          => $item->SKU ,
			'description'  => $item->description ,
			'price'        => $item->price ,
			'merchant'     => $item->seller_name , // seller_name is denoted as merchant to the outside world
    	);
    }

}
