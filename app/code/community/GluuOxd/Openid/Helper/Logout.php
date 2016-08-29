<?php

/**
 * Gluu-oxd-library
 *
 * An open source application library for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015, Gluu inc, USA, Austin
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Gluu-oxd-library
 * @version 2.4.4
 * @author	Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @copyright	Copyright (c) 2015, Gluu inc federation (https://gluu.org/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://gluu.org/
 * @since	Version 2.4.4
 * @filesource
 */

/**
 * Client Logout class
 *
 * Class is connecting to oXD-server via socket, and doing logout from gluu-server.
 *
 * @package		Gluu-oxd-library
 * @subpackage	Libraries
 * @category	Relying Party (RP) and User Managed Access (UMA)
 * @author		Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @see	        ClientOXDRP
 */

require_once 'ClientOXDRP.php';

class GluuOxd_Openid_Helper_Logout extends GluuOxd_Openid_Helper_ClientOXDRP
{
    /**
     * @var string $request_oxd_id                             Need to get after registration site in gluu-server
     */
    private $request_oxd_id = null;
    /**
     * @var string $request_id_token                           Need to get after registration site in gluu-server
     */
    private $request_id_token = null;
    /**
     * @var string $request_post_logout_redirect_uri           Need to get after registration site in gluu-server
     */
    private $request_post_logout_redirect_uri = null;
    /**
     * @var string $request_session_state                      Need to get after registration site in gluu-server
     */
    private $request_session_state = null;
    /**
     * @var string $request_state                              Need to get after registration site in gluu-server
     */
    private $request_state = null;
    /**
     * Response parameter from oXD-server
     * Doing logout user from all sites
     *
     * @var string $response_claims
     */
    private $response_html;

    /**
     * Constructor
     *
     * @return	void
     */
    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public function getRequestState()
    {
        return $this->request_state;
    }

    /**
     * @param string $request_state
     * @return	void
     */
    public function setRequestState($request_state)
    {
        $this->request_state = $request_state;
    }

    /**
     * @return string
     */
    public function getRequestSessionState()
    {
        return $this->request_session_state;
    }

    /**
     * @param string $request_session_state
     * @return	void
     */
    public function setRequestSessionState($request_session_state)
    {
        $this->request_session_state = $request_session_state;
    }


    /**
     * @param string $request_post_logout_redirect_uri
     * @return	void
     */
    public function setRequestPostLogoutRedirectUri($request_post_logout_redirect_uri)
    {
        $this->request_post_logout_redirect_uri = $request_post_logout_redirect_uri;
    }

    /**
     * @return string
     */
    public function getResponseHtml()
    {
        $this->response_html = $this->getResponseData()->url;
        return $this->response_html;
    }

    /**
     * @return string
     */
    public function getRequestIdToken()
    {
        return $this->request_id_token;
    }

    /**
     * @return string
     */
    public function getRequestPostLogoutRedirectUri()
    {
        return $this->request_post_logout_redirect_uri;
    }

    /**
     * @param string $request_id_token
     * @return	void
     */
    public function setRequestIdToken($request_id_token)
    {
        $this->request_id_token = $request_id_token;
    }

    /**
     * @return string
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
    }

    /**
     * @param string $request_oxd_id
     * @return	void
     */
    public function setRequestOxdId($request_oxd_id)
    {
        $this->request_oxd_id = $request_oxd_id;
    }
    /**
     * Protocol command to oXD server
     * @return void
     */
    public function setCommand()
    {
        $this->command = 'get_logout_uri';
    }
    /**
     * Protocol parameter to oXD server
     * @return void
     */
    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "id_token_hint" => $this->getRequestIdToken(),
            "post_logout_redirect_uri" => $this->getRequestPostLogoutRedirectUri(),
            "state" => $this->getRequestState(),
            "session_state" => $this->getRequestSessionState()
        );
    }

}