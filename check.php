<?php
function array_to_xml(array $arr, SimpleXMLElement $xml)
{
    foreach ($arr as $k => $v) {
        is_array($v)
            ? array_to_xml($v, $xml->addChild($k))
            : $xml->addChild($k, $v);
    }
    return $xml;
}

$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$query = array(
  "api-key" => "f85eb08255384dbca8de5ffcbb447e4a"
);
curl_setopt($curl, CURLOPT_URL,
  "https://api.nytimes.com/svc/topstories/v2/home.json" . "?" . http_build_query($query)
);
$result = json_decode(curl_exec($curl));
echo json_encode($result);
//echo array_to_xml($result, new SimpleXMLElement('<root/>'))->asXML();
?>