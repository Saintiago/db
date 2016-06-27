<?php

/**
 * LectureSchedule form base class.
 *
 * @method LectureSchedule getObject() Returns the current form's model object
 *
 * @package    univer
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLectureScheduleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'teacher_id' => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => false)),
      'study_id'   => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'teacher_id' => new sfValidatorPropelChoice(array('model' => 'Teacher', 'column' => 'id')),
      'study_id'   => new sfValidatorPropelChoice(array('model' => 'Study', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lecture_schedule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LectureSchedule';
  }


}
