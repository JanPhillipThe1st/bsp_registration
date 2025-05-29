<?php

class Teacher{
    protected string $table = 'schools';
    public string $schoolID = 0;
    public int $districtID  = 0;
    public string $school_name = 'school_name';
    public DateTime $date_registered;
    public string  $school_address = '';
    public string $school_contact = '';
  
   
  public static function fromJSON($inputJSON): Teacher
    {
        $data = json_decode($inputJSON, true);
        $school = new self();
        $school->schoolID = $data['schoolID'] ?? 0;
        $school->districtID = $data['districtID'] ?? 0;
        $school->school_name = $data['school_name'] ?? '';
        $school->date_registered = new DateTime($data['date_registered'] ?? 'now');
        $school->school_address = $data['school_address'] ?? '';
        $school->school_contact = $data['school_contact'] ?? '';
        return $school;
    }


}
