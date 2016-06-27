<?php

/**
 * Graduation form base class.
 *
 * @method Graduation getObject() Returns the current form's model object
 *
 * @package    univer
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseGraduationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'grade'      => new sfWidgetFormInputText(),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'study_id'   => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'grade'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'study_id'   => new sfValidatorPropelChoice(array('model' => 'Study', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('graduation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Graduation';
  }


}
