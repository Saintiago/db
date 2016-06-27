<?php

/**
 * student actions.
 *
 * @package    univer
 * @subpackage student
 * @author     Your name here
 */
class studentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Students = StudentPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Student = StudentPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Student);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StudentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StudentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Student = StudentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Student does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudentForm($Student);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Student = StudentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Student does not exist (%s).', $request->getParameter('id')));
    $this->form = new StudentForm($Student);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Student = StudentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Student does not exist (%s).', $request->getParameter('id')));
    $Student->delete();

    $this->redirect('student/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Student = $form->save();

      $this->redirect('student/edit?id='.$Student->getId());
    }
  }
}
