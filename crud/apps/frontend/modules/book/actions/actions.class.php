<?php

/**
 * book actions.
 *
 * @package    univer
 * @subpackage book
 * @author     Your name here
 */
class bookActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Books = BookPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Book = BookPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Book);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BookForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BookForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Book = BookPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Book does not exist (%s).', $request->getParameter('id')));
    $this->form = new BookForm($Book);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Book = BookPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Book does not exist (%s).', $request->getParameter('id')));
    $this->form = new BookForm($Book);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Book = BookPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Book does not exist (%s).', $request->getParameter('id')));
    $Book->delete();

    $this->redirect('book/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Book = $form->save();

      $this->redirect('book/edit?id='.$Book->getId());
    }
  }
}
