function post($url, $parametre) {
    $postVeri = '';
    foreach($parametre as $k => $v) {
        $postVeri .= $k . '='.$v.'&';
    }
    rtrim($postVeri, '&');

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postVeri);
    $cikti = curl_exec($ch);
    curl_close($ch);

    return $cikti;

}

$params = [
  'apikey' => 'Apikeyiniz',
  'id' => '9531',
  'type' => 'today'
];

echo post('http://api.tahakocak.com.tr/namazvakitleri', $params);
