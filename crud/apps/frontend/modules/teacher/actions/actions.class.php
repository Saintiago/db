<?php

/**
 * teacher actions.
 *
 * @package    univer
 * @subpackage teacher
 * @author     Your name here
 */
class teacherActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Teachers = TeacherPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Teacher = TeacherPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Teacher);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TeacherForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TeacherForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Teacher = TeacherPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Teacher does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeacherForm($Teacher);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Teacher = TeacherPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Teacher does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeacherForm($Teacher);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Teacher = TeacherPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Teacher does not exist (%s).', $request->getParameter('id')));
    $Teacher->delete();

    $this->redirect('teacher/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Teacher = $form->save();

      $this->redirect('teacher/edit?id='.$Teacher->getId());
    }
  }
}
