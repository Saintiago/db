<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    univer
 * @subpackage form
 * @author     Your name here
 */
class LoginForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'login'    => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword()
    ));

    $this->setValidators(array(
      'login'    => new sfValidatorString(array('max_length' => 255)),
      'password' => new sfValidatorString(array('max_length' => 255)),
    ));
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'checkPassword')))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }
  
  public function checkPassword($validator, $values)
  {
    
    $criteria = new Criteria();
    $criteria->add(UserPeer::LOGIN, $values['login'], Criteria::EQUAL);
    $user = UserPeer::doSelectOne($criteria);
    if (!$user)
    {
      throw new sfValidatorError($validator, 'Invalid login or password');
    }
    
    if ($values['password'] != $user->getPassword())
    {
      throw new sfValidatorError($validator, 'Invalid login or password');
    }
 
    return $values;
  }

  public function getModelName()
  {
    return 'User';
  }


}
