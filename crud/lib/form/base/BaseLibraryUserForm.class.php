<?php

/**
 * LibraryUser form base class.
 *
 * @method LibraryUser getObject() Returns the current form's model object
 *
 * @package    univer
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLibraryUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'student_id'        => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'library_record_id' => new sfWidgetFormPropelChoice(array('model' => 'LibraryRecord', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'student_id'        => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'library_record_id' => new sfValidatorPropelChoice(array('model' => 'LibraryRecord', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('library_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LibraryUser';
  }


}
