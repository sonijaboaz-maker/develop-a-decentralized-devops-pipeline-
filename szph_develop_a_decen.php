<?php

class DecentralizedDevOpsPipelineMonitor {
    private $blockchain;
    private $pipelineConfig;

    public function __construct($blockchain, $pipelineConfig) {
        $this->blockchain = $blockchain;
        $this->pipelineConfig = $pipelineConfig;
    }

    public function monitorPipeline() {
        $currentBlock = $this->blockchain->getCurrentBlock();

        $pipelineStatus = array();
        foreach ($this->pipelineConfig as $stage) {
            $status = $this->getBlockchainStatus($currentBlock, $stage);
            $pipelineStatus[$stage] = $status;
        }

        return $pipelineStatus;
    }

    private function getBlockchainStatus($block, $stage) {
        // dummy implementation, replace with actual blockchain API call
        $status = rand(0, 1) ? "success" : "failure";
        return $status;
    }
}

// Test case
$blockchain = new stdClass();
$blockchain->getCurrentBlock = function() {
    return array("id" => 123, "data" => array("stage1" => "success", "stage2" => "failure"));
};

$pipelineConfig = array("stage1", "stage2", "stage3");

$monitor = new DecentralizedDevOpsPipelineMonitor($blockchain, $pipelineConfig);
$pipelineStatus = $monitor->monitorPipeline();

print_r($pipelineStatus);

?>