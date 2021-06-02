<?php

/**
 * MyCurl
 * 傳送 get or post 參數至指定url並取回資料
 * @author Jovi
 * 
 * 
 * $curl = new MyCurl();
 * 
 * 
 * 
 *
 */
class MyCurl {
	
	/**
	 * 目標網址
	 * @var String
	 */
	var $targetUrl = '';
	
	/**
	 * 欲傳送的資料
	 * @var Array
	 */
	var $dataAry = array();
	
	/**
	 * 傳送的方法
	 * @var String
	 */
	var $method = '';
	
	/**
	 * 使用SSL
	 * @var Bollean
	 */
	var $isSSL = false;
	
	/**
	 * 指定time out 秒數
	 * @var int 
	 */
	var $timeout = 0;
	
	
	/**
	 * 建構子
	 * @param String $errUrl 
	 */
	function MyCurl(){
		
		$this->method = 'post';
		return $this;
	}
	
	/**
	 * 設定目標URL
	 * @param String $url
	 */
	function setUrl($url){
		if(!isset($url) || $url == ''){
			die('Target Url is NULL');
		}
		$urlAry = array();
		$urlAry = explode(":", $url);
		$httpAry = array('http','https');
		if(!in_array(strtolower($urlAry[0]), $httpAry)){
			die("Target Url set Error!");
		}
		if($urlAry[0] == 'https'){
			$this->setSSL('on');
		}
		$this->targetUrl = $url;
		return $this;
	}
	
	/**
	 * 指定Time Out 秒數
	 * @param Int $s 秒數
	 */
	function setTimeOut($s=20){
		if($s != '' && $s != 0){
			$this->timeout = $s;
		}
	}
	
	
	
	/**
	 * 
	 * 指定傳送資料[key=>val]
	 * @param Array $ParametersAry
	 */
	function setData($ParametersAry=''){
		
		if(!is_array($ParametersAry)){
			die('Data is not Array');
		}
		
		foreach ($ParametersAry as $key=>$val){
			$this->dataAry[$key] = $val;
		}
		
		return $this;
		
	}
	
	/**
	 * 設定是否使用SSL
	 * @param String $isSSL on|off
	 */
	function setSSL($isSSL='on'){
		$typeAry = array('on', 'off');
		if(!in_array($isSSL, $typeAry)){
			die("SSL set Error!");
		}
		
		if($isSSL == 'on'){
			$this->isSSL = true;
		}else{
			$this->isSSL = false;
		}
		
	}
	
	
	
	
	/**
	 * 指定傳送方式 get | post
	 * @param String $method
	 */
	function setMethod($method='post'){
		$typeAry = array('get', 'post');
		if(!in_array($method, $typeAry)){
			die("Method is Error!");
		}
		$this->method = $method;
		return $this;
	}
	
	/**
	 * 
	 * 取得目前傳送的URL
	 * @return string
	 */
	function getFinalUrl(){
		if($this->targetUrl == ''){
			die('Target Url is NULL');
		}
		$ParametersStr="";
		foreach ($this->dataAry as $k=>$v){
			$ParametersStr .= $k . "=" . $v . "&";
		}
		$sendData = substr($ParametersStr, 0, -1);
		
		if($this->method == 'post'){
			if($sendData != ''){
				$sendData = "[".$sendData."]";
			}
			return 'POST:'.$this->targetUrl.$sendData;
		}else{
			if($sendData != ''){
				$sendData = "?".$sendData;
			}
			return 'GET:'.$this->targetUrl.$sendData;
		}
	}
	
	
	
	/**
	 * 執行curl，開始傳送資料
	 * @return string
	 */
	function sendCurl(){
		if($this->targetUrl == ''){
			die('Target Url is NULL');
		}
		
		$ParametersStr="";
		foreach ($this->dataAry as $k=>$v){
			$ParametersStr .= $k . "=" . $v . "&";
		}
		$sendData = substr($ParametersStr, 0, -1);
		
		$ch = curl_init();
		
		if($this->method == 'post'){
			curl_setopt($ch, CURLOPT_URL, $this->targetUrl);
			//啟用時會發送一個常規的POST請求，類型為：application/x-www-form-urlencoded，就像表單提交的一樣。
			curl_setopt($ch, CURLOPT_POST, true);
			//在HTTP中的「POST」操作。如果要傳送一個文件，需要一個@開頭的文件名
			curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		}else{
			curl_setopt($ch, CURLOPT_URL, $this->targetUrl.'?'.$sendData);
			//啟用時會設置HTTP的method為GET，因為GET是默認值，所以只在被修改的情況下使用。
			curl_setopt($ch, CURLOPT_HTTPGET, true);
		}
		
		//設定是否為SSL
		if($this->isSSL){
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		}
		
		//設定time out 秒數
		if($this->timeout != 0){
			curl_setopt($ch,CURLOPT_TIMEOUT, $this->timeout);
		}
		
		//設定是否顯示檔頭訊息
		curl_setopt($ch, CURLOPT_HEADER, false);
		//強制獲取一個新的連接，替代緩存中的連接。
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		//設定返回的數據是否自動顯示
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		//接收回傳訊息
// 		$ResultStr = curl_exec($ch);
		
// 		if($ResultStr === false){
			
// 			//印出錯誤
// 			$ResultStr = curl_error($ch);
// 			//拋出NOTICE 於LOG檔
// 			trigger_error("Curl Error：".$ResultStr);
// 		}
		
		
		try{
			//接收回傳訊息
			$ResultStr = curl_exec($ch);
		}catch(Exception $e){
			throw $e;
			//印出錯誤
			$ResultStr = $e;
		}
		
		curl_close($ch);
		
		return $ResultStr;
		
	}
	
	
	
} 








?>