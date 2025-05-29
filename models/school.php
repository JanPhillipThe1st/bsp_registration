<?php

class School{
    protected string $table = 'schools';
    public int $schoolID = 0;
    public int $districtID  = 0;
    public int $school_coordinator_ID  = 0;
    public string $school_name = 'school_name';
    public string $date_registered;
    public string  $school_address = '';
    public string $school_contact = '';
  
   
  public static function fromJSON($inputJSON): School
    {
        $data = json_decode($inputJSON, true);
        $school = new self();
        $school->schoolID = $data['schoolID'] ?? 0;
        $school->districtID = $data['districtID'] ?? 0;
        $school->school_coordinator_ID = $data['school_coordinator_ID'] ?? 0;
        $school->school_name = $data['school_name'] ?? '';
        $date = new DateTime($data['date_registered'] ?? 'now');
        $school->date_registered = $date->format('Y-m-d H:i:s');;
        $school->school_address = $data['school_address'] ?? '';
        $school->school_contact = $data['school_contact'] ?? '';
        return $school;
    }
  public static function fromAssoc($data): School
    { 
        $school = new self();
        $school->schoolID = $data['schoolID'] ?? 0;
        $school->districtID = $data['districtID'] ?? 0;
        $school->school_coordinator_ID = $data['school_coordinator_ID'] ?? 0;
        $school->school_name = $data['school_name'] ?? '';
        $date = new DateTime($data['date_registered'] ?? 'now');
        $school->date_registered = $date->format('Y-m-d H:i:s');;
        $school->school_address = $data['school_address'] ?? '';
        $school->school_contact = $data['school_contact'] ?? '';
        return $school;
    }


}
