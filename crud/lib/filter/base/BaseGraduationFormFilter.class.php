<?php

/**
 * Graduation filter form base class.
 *
 * @package    univer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGraduationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'grade'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'study_id'   => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'grade'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'study_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Study', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('graduation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Graduation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'grade'      => 'Number',
      'student_id' => 'ForeignKey',
      'study_id'   => 'ForeignKey',
    );
  }
}
