<?php

/**
 * LectureAttendancy filter form base class.
 *
 * @package    univer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLectureAttendancyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'lecture_id' => new sfWidgetFormPropelChoice(array('model' => 'LectureSchedule', 'add_empty' => true)),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'lecture_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LectureSchedule', 'column' => 'id')),
      'student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lecture_attendancy_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LectureAttendancy';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'lecture_id' => 'ForeignKey',
      'student_id' => 'ForeignKey',
    );
  }
}
