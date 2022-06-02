<?php

namespace MyNameSpace\AnnualReport;

class AisConnector 
{
	public $apiUrlBase;
	private $username;
	private $password;
	protected $_requestinfo;
	private $nodes = array();
	private $master_handle;
	private $mrc;
	private $active = null;
	protected $_timeout;
	protected $_post;
	protected $_postFields;
	protected $_session;
	protected $_includeHeader;
	protected $_noBody;

	/**
	 * @param array $options
	 * @throws \Exception
	 */
	public function __construct($options = array('environment'=>null))
	{
		require ('/data/credentials/ssd-api/ais-api.php');
		$this->username = $username;
		$this->password = $password;

		switch ($options['environment'])
		{
			case 'dev':
				$this->apiUrlBase = 'https://ws-apidev.MyNameSpace.edu/AIS/v1/';
				break;

			case 'prod':
				$this->apiUrlBase = 'https://ws-api.MyNameSpace.edu/AIS/v1/';
				break;

			default: 
				throw new \Exception ('Environment is not valid.');
				break;
		}
		
		return true;
	}

	/**
	 * @param $options
	 * @return \StdClass
	 */
	private function curl($options)
	{
		$ch = curl_init();

		curl_reset($ch);

		curl_setopt_array($ch, $options);

		$response = curl_exec($ch);
	    $errorNo = curl_errno($ch); 
	    $error = curl_error($ch);
	    $header = curl_getinfo($ch);		
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$headerFromResponse = substr($response, 0, $header_size);
		$body = substr($response, $header_size);

		curl_close($ch); 

		$return = new \StdClass;
		$return->body = $body;
		$return->error = $error;
		$return->header = $headerFromResponse;

		return $return;
	}

	/**
	 * @param $partialApiEndpoint
	 * @return \StdClass
	 * @throws \Exception
	 */
	public function get($partialApiEndpoint)
	{
        set_time_limit(0);
        $options = array(
			CURLOPT_URL => $this->apiUrlBase.$partialApiEndpoint,
			CURLOPT_RETURNTRANSFER =>  true,
            CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_TIMEOUT => 60,
			CURLOPT_USERPWD => $this->username.':'.$this->password,
			CURLOPT_HEADER => true
		);

		$curlReturn = $this->curl($options);

		$errors = array();
		if ($curlReturn->error)
		{
			$errors = array($curlReturn->error);
		}

		$body = json_decode($curlReturn->body);

		$return = new \StdClass;
		$return->body = $body;
		$return->header = $curlReturn->header;
		$return->errors = $errors;

		if (count($return->errors) > 0)
		{
			$msg = 'AIS API is not available: '.implode(',',$return->errors);
			throw new \Exception ($msg);
		}

		if (strpos($return->header, 'HTTP/1.1 401') !== false || 
			strpos($return->header, 'HTTP/1.1 500') !== false)
		{
			$msg = 'AIS API is not available: '.$return->header;
			throw new \Exception($msg);
		}

		return $return;
	}

	/**
	 * @param array $list
	 * @return $this
	 */
	public function createCurlMultiple( $list = array() )
	{
		$this->master_handle = curl_multi_init();
		$this->nodes = array();
		try {
			if( !empty($list) )
			{
				foreach ( $list as $endPoint )
				{
					$tmp_handle = $this->createHandle( $this->apiUrlBase . $endPoint );
					$this->nodes[] = $tmp_handle;
					curl_multi_add_handle($this->master_handle, $tmp_handle );
				}
				do {
					$this->mrc = curl_multi_exec($this->master_handle, $this->active);
				} while( $this->mrc == CURLM_CALL_MULTI_PERFORM );


				while( $this->active  )
				{
					if( curl_multi_select($this->master_handle) != -1 && $this->mrc == CURLM_OK )
					{
						do
						{
							$this->mrc = curl_multi_exec( $this->master_handle, $this->active );
						} while( $this->mrc === CURLM_CALL_MULTI_PERFORM );
					}

					if( $this->mrc != CURLM_OK ){
                        // Display error message
                        echo "ERROR!\n " . curl_multi_strerror($this->mrc);
                    }
				}
			}

		} catch (Exception $e) {
			Application::handleExceptions($e);
		}

		return $this;
	}
	/**
	 * @return array of multi curl handle content.
	 */
	public function fetchContent()
	{
		return array_map( "curl_multi_getcontent" , $this->nodes);
	}

	/**
	 * @return array of curl resources.
	 */
	public function fetchNodes()
	{
		return $this->nodes;
	}

	/**
	 * @param null $url
	 * @return resource
	 */
	public function createHandle( $url = null )
	{
		if( !is_null($url) )
		{
			$s = curl_init();

			curl_setopt($s,CURLOPT_URL,$url);
			curl_setopt($s,CURLOPT_HTTPHEADER,array('Expect:'));
			curl_setopt($s,CURLOPT_TIMEOUT,$this->_timeout);
			curl_setopt($s, CURLOPT_CONNECTTIMEOUT ,0);
			curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($s, CURLOPT_VERBOSE, 1);

			curl_setopt($s, CURLOPT_USERPWD, $this->username.':'.$this->password);

			if($this->_post)
			{
				curl_setopt($s,CURLOPT_POST,true);
				curl_setopt($s,CURLOPT_POSTFIELDS,$this->_postFields);
			}

			if($this->_includeHeader)
			{
				curl_setopt($s,CURLOPT_HEADER,true);
			}

			if($this->_noBody)
			{
				curl_setopt($s,CURLOPT_NOBODY,true);
			}

			return $s;
		}
	}

	/**
	 * Clear old handles from the master handle.
	 */
	public function clear()
	{
		if( count($this->nodes) > 0 )
		{
			foreach ($this->nodes as $n)
			{
				curl_multi_remove_handle($this->master_handle, $n );
			}
			curl_multi_close($this->master_handle);
		}
	}
	
}