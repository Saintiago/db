<?php

/**
 * study actions.
 *
 * @package    univer
 * @subpackage study
 * @author     Your name here
 */
class studyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Studys = StudyPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Study = StudyPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Study);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StudyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StudyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Study = StudyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Study does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudyForm($Study);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Study = StudyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Study does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudyForm($Study);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Study = StudyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Study does not exist (%s).', $request->getParameter('id')));
    $Study->delete();

    $this->redirect('study/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Study = $form->save();

      $this->redirect('study/edit?id='.$Study->getId());
    }
  }
}
