<?php
namespace common\services\api;

use yii\base\Exception;

abstract class AbstractJsonApiClient
{
    protected $base_url;
    protected $login;
    protected $password;
    protected $user_agent;
    protected $headers;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }

    abstract public function createResponse($answer, $response_time);

    public function getBaseUrl()
    {
        return $this->base_url;
    }
    
    public function setBaseUrl($base_url)
    {
        $this->base_url = $base_url;
    }

    public function setAuth($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function setUserAgent($name)
    {
        $this->user_agent = $name;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function isCredentialsSet()
    {
        return ($this->login or $this->oauth_token);
    }

    public function get($path)
    {
        return $this->request($path, null, "GET");
    }

    public function post($path, $fields = null, $json_header = true)
    {
        return $this->request($path, $fields, "POST", $json_header);
    }

    public function put($path, $fields = null)
    {
        return $this->request($path, $fields, "PUT");
    }

    public function delete($path)
    {
        return $this->request($path, null, "DELETE");
    }

    public function request($path, $post_fields = null, $method = 'GET', $json_header = true)
    {
        $ch = curl_init();
        $headers = (true === $json_header) ? ['Content-Type: application/json'] : [];

        # basic auth
        if ($this->login && $this->password) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, $this->login . ":" . $this->password);
        }

        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_URL, $this->base_url . $path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $fields_string = '';
        if (in_array($method, ['POST', 'PUT'])) {
            if (empty($post_fields)) {
                $fields_string = '';
            } else {
                $fields_string = is_string($post_fields) ? $post_fields : json_encode($post_fields);
            }
            if ('POST' == $method) {
                curl_setopt($ch, CURLOPT_POST, true);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            $headers[] = 'Content-Length: ' . strlen($fields_string);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);

        $status_code = $info['http_code'];
        $request_time = $info['total_time'];
        $status_string = strstr($response, "\n", true);
        $this->parseHeaders(substr($response, 0, $info['header_size']));
        $body = substr($response, $info['header_size']);
        curl_close($ch);
        if (0 == strlen($body)) {
            if (401 == $status_code) {
                return (object)[
                    'data' => new \stdClass(),
                    'meta' => (object)[
                        'code' => $status_code,
                        'error_message' => (200 == $status_code) ? '' : $status_string,
                        'error_type' => "AuthError",
                        'time' => $request_time,
                    ],
                ];
            }

            return (object)[
                'data' => new \stdClass(),
                'meta' => (object)[
                    'code' => $status_code,
                    'error_message' => (200 == $status_code) ? '' : $status_string,
                    'error_type' => "EmptyResponse",
                    'time' => $request_time,
                ],
            ];
        }
        if (!$result = json_decode($body)) {
            throw new Exception("Server response is not json");
        }

        return $this->createResponse($result, $request_time);
    }

    protected function parseHeaders($header_string)
    {
        $arr = [];
        $headers = explode("\r\n", trim($header_string));
        foreach ($headers as $line => $header) {
            // ignore http status code
            if ($line != 0) {
                $res = explode(':', $header, 2);
                // ignore bad header
                if (array_key_exists(1, $res)) {
                    $arr[$res[0]] = trim($res[1]);
                }
            }
        }
        $this->headers = $arr;
    }

    public function getHeader($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : null;
    }
}
