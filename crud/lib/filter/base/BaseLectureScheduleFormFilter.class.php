<?php

/**
 * LectureSchedule filter form base class.
 *
 * @package    univer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLectureScheduleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'teacher_id' => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => true)),
      'study_id'   => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'teacher_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Teacher', 'column' => 'id')),
      'study_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Study', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lecture_schedule_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LectureSchedule';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'teacher_id' => 'ForeignKey',
      'study_id'   => 'ForeignKey',
    );
  }
}
