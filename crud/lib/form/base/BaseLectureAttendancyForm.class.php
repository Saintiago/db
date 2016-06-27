<?php

/**
 * LectureAttendancy form base class.
 *
 * @method LectureAttendancy getObject() Returns the current form's model object
 *
 * @package    univer
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLectureAttendancyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'lecture_id' => new sfWidgetFormPropelChoice(array('model' => 'LectureSchedule', 'add_empty' => false)),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'lecture_id' => new sfValidatorPropelChoice(array('model' => 'LectureSchedule', 'column' => 'id')),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lecture_attendancy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LectureAttendancy';
  }


}
