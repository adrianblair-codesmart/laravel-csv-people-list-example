<?php
namespace App;

class Person extends ValidatedModel
{

  protected $fillable = [
    'firstname',
    'surname',
    'email'
  ];

  protected $rules = array(
    'firstname' => 'required',
    'surname' => 'required',
    'email' => 'required|email'
  );
}
