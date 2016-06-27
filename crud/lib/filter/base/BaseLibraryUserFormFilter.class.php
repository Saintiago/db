<?php

/**
 * LibraryUser filter form base class.
 *
 * @package    univer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLibraryUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'        => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'library_record_id' => new sfWidgetFormPropelChoice(array('model' => 'LibraryRecord', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'library_record_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LibraryRecord', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('library_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LibraryUser';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'student_id'        => 'ForeignKey',
      'library_record_id' => 'ForeignKey',
    );
  }
}
