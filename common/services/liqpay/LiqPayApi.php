<?php
namespace common\services\liqpay;

/**
 * Liqpay Payment Module
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category        LiqPay
 * @package         liqpay/liqpay
 * @version         3.0
 * @author          Liqpay
 * @copyright       Copyright (c) 2014 Liqpay
 * @license         http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * EXTENSION INFORMATION
 *
 * LIQPAY API       https://www.liqpay.com/ru/doc
 *
 */

/**
 * Payment method liqpay process
 *
 * @author      Liqpay <support@liqpay.com>
 */
class LiqPayApi
{
    private $api_url = 'https://www.liqpay.ua/api/';
    private $checkout_url = 'https://www.liqpay.ua/api/3/checkout';
    protected $supportedCurrencies = ['EUR', 'UAH', 'USD', 'RUB', 'RUR'];
    private $public_key;
    private $private_key;

    /**
     * Constructor.
     *
     * @param string $public_key
     * @param string $private_key
     *
     * @throws InvalidArgumentException
     */
    public function __construct($public_key, $private_key)
    {
        if (empty($public_key)) {
            throw new InvalidArgumentException('public_key is empty');
        }
        if (empty($private_key)) {
            throw new InvalidArgumentException('private_key is empty');
        }
        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     *
     * @return string
     */
    public function api($path, $params = [])
    {
        if (!isset($params['version'])) {
            throw new InvalidArgumentException('version is null');
        }
        $url = $this->api_url . $path;
        $public_key = $this->public_key;
        $private_key = $this->private_key;
        $data = base64_encode(json_encode(array_merge(compact('public_key'), $params)));
        $signature = base64_encode(sha1($private_key . $data . $private_key, 1));
        $postfields = http_build_query([
            'data' => $data,
            'signature' => $signature,
        ]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $server_output = curl_exec($ch);
        curl_close($ch);

        return json_decode($server_output);
    }

    /**
     * cnbForm
     *
     * @param array $params
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function cnbForm($params)
    {
        $language = 'ru';
        if (isset($params['language']) && $params['language'] == 'en') {
            $language = 'en';
        }
        $params = $this->cnbParams($params);
        $data = base64_encode(json_encode($params));
        $signature = $this->cnbSignature($params);

        return sprintf(
            '
            <form method="POST" action="%s" accept-charset="utf-8">
                %s
                %s
                <input type="image" src="//static.liqpay.ua/buttons/p1%s.radius.png" name="btn_text" />
            </form>
            ',
            $this->checkout_url,
            sprintf('<input type="hidden" name="%s" value="%s" />', 'data', $data),
            sprintf('<input type="hidden" name="%s" value="%s" />', 'signature', $signature),
            $language
        );
    }

    /**
     * cnbSignature
     *
     * @param array $params
     *
     * @return string
     */
    public function cnbSignature($params)
    {
        $params = $this->cnbParams($params);
        $private_key = $this->private_key;
        $json = base64_encode(json_encode($params));
        $signature = $this->strToSign($private_key . $json . $private_key);

        return $signature;
    }

    /**
     * cnbParams
     *
     * @param array $params
     *
     * @return array $params
     */
    private function cnbParams($params)
    {

        $params['public_key'] = $this->public_key;
        if (!isset($params['version'])) {
            throw new InvalidArgumentException('version is null');
        }
        if (!isset($params['amount'])) {
            throw new InvalidArgumentException('amount is null');
        }
        if (!isset($params['currency'])) {
            throw new InvalidArgumentException('currency is null');
        }
        if (!in_array($params['currency'], $this->supportedCurrencies)) {
            throw new InvalidArgumentException('currency is not supported');
        }
        if ($params['currency'] == 'RUR') {
            $params['currency'] = 'RUB';
        }
        if (!isset($params['description'])) {
            throw new InvalidArgumentException('description is null');
        }

        return $params;
    }

    /**
     * strToSign
     *
     * @param string $str
     *
     * @return string
     */
    public function strToSign($str)
    {
        $signature = base64_encode(sha1($str, 1));

        return $signature;
    }
}
