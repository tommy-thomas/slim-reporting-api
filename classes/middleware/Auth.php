<?php


namespace MyNameSpace\AnnualReport\Middleware;

class Auth
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     */
    public function __invoke($request, $response, $next)
    {
        if ( !$this->valid($request) )
        {
           return $response
                ->withStatus(401)
                ->withHeader('Content-Type', 'text/html')
                ->write("Incorrect user or password.");
        }
        $response = $next($request, $response);
        return $response;
    }

    public function valid( $request )
    {   
        require ('/path/to/credentials');
        $protectedUser = $username;
        $protectedPassword = $password;
        $user = isset($request->getHeader('HTTP_USERNAME')[0]) ? $request->getHeader('HTTP_USERNAME')[0] : null;
        $password = isset($request->getHeader('HTTP_PASSWORD')[0]) ? $request->getHeader('HTTP_PASSWORD')[0] : null;
        return  !(is_null($user) &&  !is_null($password)) &&
        ( $user == $protectedUser && $password == $protectedPassword ) ? true : false;
    }
}
