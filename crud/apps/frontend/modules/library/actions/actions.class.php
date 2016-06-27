<?php

/**
 * library actions.
 *
 * @package    univer
 * @subpackage library
 * @author     Your name here
 */
class libraryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->LibraryRecords = LibraryRecordPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->LibraryRecord = LibraryRecordPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->LibraryRecord);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LibraryRecordForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LibraryRecordForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($LibraryRecord = LibraryRecordPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LibraryRecord does not exist (%s).', $request->getParameter('id')));
    $this->form = new LibraryRecordForm($LibraryRecord);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($LibraryRecord = LibraryRecordPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LibraryRecord does not exist (%s).', $request->getParameter('id')));
    $this->form = new LibraryRecordForm($LibraryRecord);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($LibraryRecord = LibraryRecordPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LibraryRecord does not exist (%s).', $request->getParameter('id')));
    $LibraryRecord->delete();

    $this->redirect('library/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $LibraryRecord = $form->save();

      $this->redirect('library/edit?id='.$LibraryRecord->getId());
    }
  }
}
