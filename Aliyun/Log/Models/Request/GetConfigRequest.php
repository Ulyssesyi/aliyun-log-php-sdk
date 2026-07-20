<?php
/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved
 */

/**
 * 
 *
 * @author log service dev
 */
namespace Aliyun\Log\Models\Request;

class GetConfigRequest extends \Aliyun\Log\Models\Request {

    private $configName;

    /**
     * GetConfigRequest Constructor
     *
     */
    public function __construct($configName = null) {
        $this->configName = $configName;
    }

    public function getConfigName(){
      return $this->configName;
    }

    public function setConfigName($configName){
      $this->configName = $configName;
    }
    
}
