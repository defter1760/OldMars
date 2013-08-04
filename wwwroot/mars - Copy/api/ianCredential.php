<?php
class Login {
  public $Email; // string
  public $Password; // string
}

class LoginResponse {
  public $LoginResult; // LoginResult
}

class LoginResult {
  public $Success; // boolean
  public $ErrorCode; // ErrorCode
  public $AuthenticationMessage; // string
  public $Accounts; // ArrayOfAccount
}

class ErrorCode {
  const User_Does_Not_Exist_In_System = 'User_Does_Not_Exist_In_System';
  const Account_Lacks_Permissions = 'Account_Lacks_Permissions';
  const User_Lacks_Permissions = 'User_Lacks_Permissions';
  const User_Authentication_Failed = 'User_Authentication_Failed';
  const Unspecified_Error = 'Unspecified_Error';
  const Success = 'Success';
}

class Account {
  public $AccountID; // string
  public $AccountName; // string
  public $UserID; // string
  public $UserName; // string
  public $Email; // string
}

/**
 * Credential class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Credential extends SoapClient {

  private static $classmap = array(
                                    'Ping' => 'Ping',
                                    'PingResponse' => 'PingResponse',
                                    'Login' => 'Login',
                                    'LoginResponse' => 'LoginResponse',
                                    'LoginResult' => 'LoginResult',
                                    'ErrorCode' => 'ErrorCode',
                                    'Account' => 'Account',
                                    'GetAuthenticationToken' => 'GetAuthenticationToken',
                                    'GetAuthenticationTokenResponse' => 'GetAuthenticationTokenResponse',
                                    'RequestSenderToken' => 'RequestSenderToken',
                                    'RequestSenderTokenResponse' => 'RequestSenderTokenResponse',
                                    'RequestCorrectToken' => 'RequestCorrectToken',
                                    'RequestCorrectTokenResponse' => 'RequestCorrectTokenResponse',
                                   );

  public function Credential($wsdl = "https://demo.docusign.net/api/3.0/credential.asmx?WSDL", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param Ping $parameters
   * @return PingResponse
   */
  public function Ping(Ping $parameters) {
    return $this->__soapCall('Ping', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/Credential',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Login $parameters
   * @return LoginResponse
   */
  public function Login(Login $parameters) {
    return $this->__soapCall('Login', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/Credential',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAuthenticationToken $parameters
   * @return GetAuthenticationTokenResponse
   */
  public function GetAuthenticationToken(GetAuthenticationToken $parameters) {
    return $this->__soapCall('GetAuthenticationToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/Credential',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestSenderToken $parameters
   * @return RequestSenderTokenResponse
   */
  public function RequestSenderToken(RequestSenderToken $parameters) {
    return $this->__soapCall('RequestSenderToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/Credential',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param RequestCorrectToken $parameters
   * @return RequestCorrectTokenResponse
   */
  public function RequestCorrectToken(RequestCorrectToken $parameters) {
    return $this->__soapCall('RequestCorrectToken', array($parameters),       array(
            'uri' => 'http://www.docusign.net/API/Credential',
            'soapaction' => ''
           )
      );
  }

}

?>
