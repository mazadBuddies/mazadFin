<?php
class dateCalc{
    private $startDate;
    private $endDate;
    private $diff;
    public function __construct($startTime, $endTime){
        $this->startDate = $startTime;
        $this->endDate   = $endTime;
    }
    public function dateCalcu(){
        $this->diff = abs(strtotime($this->startDate) - strtotime($this->endDate));
        $daysAsArray = array();
        $daysAsArray['year']    = floor($this->diff / (365*60*60*24));
        $daysAsArray['month']   = floor(($this->diff - $daysAsArray['year'] * 365*60*60*24) / (30*60*60*24));
        $daysAsArray['day'] = floor(($this->diff - $daysAsArray['year'] * 365*60*60*24 - $daysAsArray['month']*30*60*60*24)/ (60*60*24));
        return $daysAsArray;
    }
}

$hello= new dateCalc("2013-02-28","2016-02-20");
echo "<pre>";
print_r($hello -> dateCalcu());
echo "</pre>";