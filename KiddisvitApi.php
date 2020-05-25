<?php

class KiddisvitApi
{
    private $host = 'http://176.111.63.105';
    private $port = '3569';
    private $uri = '/ERP_copy/ws/b2b?wsdl';
    private $contentType = 'text/xml; charset=utf-8';
    private $authToken = null;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getBody()
    {
        return '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:b2b="http://192.168.0.244/b2b">
                            <soap:Header/>
                            <soap:Body>
                                <b2b:getMutualSettlement>
                                    <ВходящаяСтрока>
                                        {"user":"kiryuhina_yulya","ClientID":"4c453fdc-28a2-11e2-bef1-00e081c60e22",
                                        "ClientName":"Желязкова Юлия Владимировна ФОП","Contract":"4c453fde-28a2-11e2-bef1-00e081c60e22",
                                         "DateFrom":"20190701","DateTo":"20190801"}
                                    </ВходящаяСтрока>
                                </b2b:getMutualSettlement>
                            </soap:Body>
                            </soap:Envelope>';
    }

    public function doRequest()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->host . $this->uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_PORT, $this->port);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getBody());
        $out = curl_exec($curl);

        $out = str_replace('!--', '', $out);
        $out = str_replace('?--', '?', $out);
        if ($out === false) {
            print_r('Curl error: ' . curl_error($curl));
        } else {
            file_put_contents('./data.txt', $out);
        }

        curl_close($curl);

        return $out;
    }

    public function fakeRequest()
    {
        return file_get_contents('./data.txt');
    }

    private function getHeader()
    {
        return [
            'Content-type: '.$this->contentType,
            'Authorization: Basic '.$this->authToken,
            'Content-Length: ' . mb_strlen($this->getBody())
        ];
    }
}