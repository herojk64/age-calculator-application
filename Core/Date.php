<?php

namespace Core;

class Date
{
    protected $day;
    protected $month;
    protected $year;

    protected $error = false;

    public function set($day,$month,$year){
        $this->day=$day;
        $this->month=$month;
        $this->year=$year;
        return $this;
    }

    protected function validate():bool{
        if(!$this->day){
            $_SESSION['dayError']="The field is required";
            $this->error = true;
        }

        if(!$this->month){
            $_SESSION['monthError']="The field is required";
            $this->error = true;
        }

        if(!$this->year){
            $_SESSION['yearError']="The field is required";
            $this->error = true;
        }

        if(!checkdate($this->month,$this->day,$this->year)){
            $_SESSION['dayError']="Must be a valid day";
            $_SESSION['monthError']="Must be a valid month";
            $_SESSION['yearError']="Must be a valid year";
            $this->error = true;
        }

        if($this->year<date("Y")-80 || $this->year>date('Y')){
            $_SESSION['yearError']="Must be a valid year";
            $this->error = true;
        }

        if($this->error){
            return false;
        }

        return true;
    }

    public function getAge()
    {
        if (!$this->validate()) {
            return [];
        }

        $currentDate = new \DateTime();
        $inputDate = new \DateTime("{$this->year}-{$this->month}-{$this->day}");

        $age = $currentDate->diff($inputDate);

        return [
            'years' => $age->y,
            'months' => $age->m,
            'days' => $age->d,
        ];
    }
}