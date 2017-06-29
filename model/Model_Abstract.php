<?php
/**
 * Abstract model used to define class models in a more traditional way.
 * 
 * @author Joseph Fehrman
 * @since 29 June, 2017
 */
class Model_Abstract extends RedBean_SimpleModel{
  protected $requiredFields = array();
  protected $possibleFields = array();

  /** Accessor objects. */
  function getRequiredFields(){
    return $requiredFields;
  }

  function getPossibleFields(){
    return $possibleFields;
  }

  /**
   * Function that evaluates that all fields are possible fields and that all required fields exists.
   */
  function update(){

    // Check the required fields to see if each required field exists.
    forEach($requiredFields as $field){
      if(!$this->bean->contains($field)){
        throw new Exception("Required field $field does not exists.");
      }
    }

    // Check to see if there are any fields that are not specified as a possible field.
    forEach($this->bean as $key => $value){
      if(!$possibleFields->contains($key)){
        throw new Exception("Invalid field $key passed to model.");
      }
    }
 
    // Validate bean. 
    if(!validate($this->bean)){
      throw new Exception("Bean is not valid.  For a more detailed message throw a custom exception in validation function.");
    }
  }

  /**
   * Validate the bean.
   *
   * @return Valid.
   */
  function validate($bean){
    return true;
  }
}
?>
