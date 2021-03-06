<?php

class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
  protected $validators;

  public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
    foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
      if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
        $this->{$attribute} = $value;
      }
    }
  }


  public function validate_name() {
    $errors = array();
    if($this->name == '' || $this->name == null) {
      $errors[] = 'Name must not be empty';
    }
    if(strlen($this->name) < 4) {
      $errors[] = 'Name must be at least 4 characters long';
    }
    if(strlen($this->name) > 50) {
      $errors[] = 'Name must be at maximum 50 characters long';
    }
    return $errors;
  }

  public function validate_free_name($name) {
    $errors = array();
    if(Gamemaster::findName($name)) {
      $errors[] = 'Name already in use';
    }
    return $errors;
  }

  public function validate_password() {
    $errors = array();
    if($this->password == '' || $this->password == null) {
      $errors[] = 'Password must not be empty';
    }
    if(strlen($this->password) < 6) {
      $errors[] = 'Password must be at least 6 characters long';
    }
    if(strlen($this->password) > 50) {
      $errors[] = 'Password must be at maximum 50 characters long';
    }
    return $errors;
  }

}
