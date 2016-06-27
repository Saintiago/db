<?php

/**
 * attendancy actions.
 *
 * @package    univer
 * @subpackage attendancy
 * @author     Your name here
 */
class attendancyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->LectureAttendancys = LectureAttendancyPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->LectureAttendancy = LectureAttendancyPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->LectureAttendancy);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LectureAttendancyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LectureAttendancyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($LectureAttendancy = LectureAttendancyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LectureAttendancy does not exist (%s).', $request->getParameter('id')));
    $this->form = new LectureAttendancyForm($LectureAttendancy);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($LectureAttendancy = LectureAttendancyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LectureAttendancy does not exist (%s).', $request->getParameter('id')));
    $this->form = new LectureAttendancyForm($LectureAttendancy);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($LectureAttendancy = LectureAttendancyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object LectureAttendancy does not exist (%s).', $request->getParameter('id')));
    $LectureAttendancy->delete();

    $this->redirect('attendancy/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $LectureAttendancy = $form->save();

      $this->redirect('attendancy/edit?id='.$LectureAttendancy->getId());
    }
  }
}
