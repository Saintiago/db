<?php

/**
 * LibraryRecord filter form base class.
 *
 * @package    univer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLibraryRecordFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'book_id'  => new sfWidgetFormPropelChoice(array('model' => 'Book', 'add_empty' => true)),
      'quantity' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'book_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Book', 'column' => 'id')),
      'quantity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('library_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LibraryRecord';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'book_id'  => 'ForeignKey',
      'quantity' => 'Number',
    );
  }
}
