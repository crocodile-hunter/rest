<?php

/**
 * The Controller is used to execute REST requests and return results in the form of JSON
*/ 
abstract class ApiController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        
    }

    /**
     * Getter for statusCode
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     * Setter for statusCode
     *
     * @param int $statusCode Value to set
     *
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * creates an output for an array of objects
     *
     * @param Collection $response a collection of items
     *
     * @return mixed
     */
    protected function respondArray( $response )
    {
        $toReturn = array();
        foreach ($response as $value) {
               $toReturn[] = $this->transform ($value );
        } 
        return $this->respond( $toReturn );
        
    }

    /**
     * creates an output for a single resource object
     *
     * @param Resource $response a single resource object
     *
     * @return mixed
     */
    protected function respondItem($response )
    {
        return $this->respond( $this->transform ( $response ) );
    }

    /**
     * creates an output in JSON
     *
     * @param Collection $response a single resource object
     *
     * @return mixed
     */
    private function respond($response)
    {

        $response = Response::json(  $response , $this->statusCode, array() );

        $response->header('Content-Type', 'application/json');

        return $response;
    }
  
   
    /**
     * Generates error response
     *
     * @param string $message
     * @param string $errorCode custom error codes for our API
     * @return mixed
     */
    protected function respondError($message, $errorCode)
    {
        return $this->respond([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message,
            ]
        ]);
    }
 
    /**
     * Generates a Response with a 404 HTTP header and a given message.
     *
     * @return  Response
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)->respondError($message, 'AINTNOTHINGHERE');
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     *
     * @return  Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)->respondError($message, 'WRONGARGUMENTSBOY');
    }

    /**
    * This is a rather important function which encapsulates the Resource attributes from the output. 
    * Its meant to be a single point of definition for this form of encapsulation
    */
    public abstract function transform( $item );

}