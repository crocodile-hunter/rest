<?php


function curl_request( $url, $params = array(), $request)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);

	if ( $request == 'POST')
		curl_setopt($curl, CURLOPT_POST, true);
	else
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $request );
	if ( ! empty( $params ))
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));

	curl_setopt($curl, CURLOPT_HTTPHEADER, array( 'Expect:' ) ); // Prevents 100 Continue  

	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
			
			// Return output as a string
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			
			// Execute cURL call
	$curl_result = curl_exec($curl);

	print_r( $curl_result);
}


echo "Attempt saving product";

$params = array("SKU"=> "SKUFOTHIS","price"=>"123" , "name"=> "man", "merchant"=> "MANDOLLA",  "description"=>"product");
$url = "http://localhost:8000/product";
curl_request ( $url, $params, 'POST');

echo "<p>Attempt updating a product</p>";

$params = array("price"=>"123" , "name"=> "Title edited", "merchant"=> "MANDOLLA",  "description"=>"product");
$url = "http://localhost:8000/product/4";
curl_request ( $url, $params, 'PUT');

echo "<p>Attempt deleting a product</p>";

$url = "http://localhost:8000/product/1";
curl_request ( $url, NULL, 'DELETE');

echo "Attempt saving merchant";

$params = array( "name"=> "man", "website"=> "http://www.c.com",  "email"=>"email@fdd.com");
$url = "http://localhost:8000/merchant";
curl_request ( $url, $params, 'POST');


