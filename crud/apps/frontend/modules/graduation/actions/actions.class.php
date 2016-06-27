<?php

/**
 * graduation actions.
 *
 * @package    univer
 * @subpackage graduation
 * @author     Your name here
 */
class graduationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Graduations = GraduationPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Graduation = GraduationPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Graduation);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GraduationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GraduationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Graduation = GraduationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Graduation does not exist (%s).', $request->getParameter('id')));
    $this->form = new GraduationForm($Graduation);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Graduation = GraduationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Graduation does not exist (%s).', $request->getParameter('id')));
    $this->form = new GraduationForm($Graduation);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Graduation = GraduationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Graduation does not exist (%s).', $request->getParameter('id')));
    $Graduation->delete();

    $this->redirect('graduation/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Graduation = $form->save();

      $this->redirect('graduation/edit?id='.$Graduation->getId());
    }
  }
}
