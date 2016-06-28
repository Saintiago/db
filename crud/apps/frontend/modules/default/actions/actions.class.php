<?php

/**
 * default actions.
 *
 * @package    univer
 * @subpackage default
 * @author     Your name here
 */
class defaultActions extends sfActions
{
  
  public function executeExtraOne(sfWebRequest $request)
  {
    /*
    SELECT student_name
    FROM student
    INNER JOIN library_user USING (student_id)
    INNER JOIN library USING (library_record_id)
    INNER JOIN book USING (book_id)
    WHERE book_name = 'Databases book';
    */
    
    $bookName = $request->getGetParameter('book_name', 'Databases book');
    $criteria = new Criteria();
    $criteria->addJoin(StudentPeer::ID, LibraryUserPeer::STUDENT_ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LibraryUserPeer::LIBRARY_RECORD_ID, LibraryRecordPeer::ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LibraryRecordPeer::BOOK_ID, BookPeer::ID, Criteria::INNER_JOIN);
    $criteria->add(BookPeer::NAME, $bookName, Criteria::EQUAL);
    $this->students = StudentPeer::doSelect($criteria);
  }
  
  public function executeExtraTwo(sfWebRequest $request)
  {
    /*
    SELECT student_name, GROUP_CONCAT(teacher_name)
    FROM student
    INNER JOIN lecture_attendancy USING (student_id)
    INNER JOIN lecture_schedule USING (lecture_id)
    INNER JOIN teacher USING (teacher_id)
    GROUP BY student_id;
    */
    
    $criteria = new Criteria();
    $criteria->clearSelectColumns();
    $criteria->addSelectColumn(StudentPeer::NAME);
    $criteria->addJoin(StudentPeer::ID, LectureAttendancyPeer::STUDENT_ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LectureAttendancyPeer::LECTURE_ID, LectureSchedulePeer::ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LectureSchedulePeer::TEACHER_ID, TeacherPeer::ID, Criteria::INNER_JOIN);
    $criteria->addAsColumn('teachers', $this->getGroupConcatSql(TeacherPeer::NAME));
    $criteria->addGroupByColumn(StudentPeer::NAME);
    $this->students = StudentPeer::doSelectStmt($criteria)->fetchAll();
  }
  
  public function executeExtraThree(sfWebRequest $request)
  {
    /*
    SELECT teacher_name, count(distinct student_id) as cnt
    FROM teacher
    INNER JOIN lecture_schedule USING (teacher_id)
    INNER JOIN lecture_attendancy USING (lecture_id)
    INNER JOIN student USING (student_id)
    GROUP BY teacher_name
    ORDER BY cnt desc;
    */
    
    $criteria = new Criteria();
    $criteria->clearSelectColumns();
    $criteria->addSelectColumn(TeacherPeer::NAME);
    $criteria->addJoin(TeacherPeer::ID, LectureSchedulePeer::TEACHER_ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LectureSchedulePeer::ID, LectureAttendancyPeer::LECTURE_ID, Criteria::INNER_JOIN);
    $criteria->addJoin(LectureAttendancyPeer::STUDENT_ID, StudentPeer::ID, Criteria::INNER_JOIN);
    $criteria->addAsColumn('students_count', $this->getSumSql(StudentPeer::ID));
    $criteria->addDescendingOrderByColumn('students_count');
    $criteria->addGroupByColumn(TeacherPeer::NAME);
    
    $this->teachers = TeacherPeer::doSelectStmt($criteria)->fetchAll();
  }
  
  private function getGroupConcatSql($columnName)
  {
    return 'GROUP_CONCAT(DISTINCT ' . $columnName . ' SEPARATOR ", ")';
  }
  
  private function getSumSql($columnName)
  {
    return 'SUM(DISTINCT ' . $columnName . ')';
  }
  
  public function executeLogoff(sfWebRequest $request)
  {
    sfContext::getInstance()->getUser()->setAuthenticated(false);
    $this->forward('default', 'login');
  }
  
  public function executeLogin(sfWebRequest $request)
  {
    if (sfContext::getInstance()->getUser()->isAuthenticated())
    {
      $this->forward('default', 'modules');
    }
    
    $this->form = new LoginForm();
    
    $action = $request->getPostParameter('action');
    if ($action == 'login')
    {
        $this->doLogin($request);
    }
    
  }
  
  private function doLogin(sfWebRequest $request)
  {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if ($this->form->isValid())
      {
        sfContext::getInstance()->getUser()->setAuthenticated(true);
        $this->forward('default', 'modules');
      }
  }
  
  public function executeModules(sfWebRequest $request)
  {
    
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->Users = UserPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->User = UserPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->User);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($User = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object User does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserForm($User);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($User = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object User does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserForm($User);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($User = UserPeer::retrieveByPk($request->getParameter('id')), sprintf('Object User does not exist (%s).', $request->getParameter('id')));
    $User->delete();

    $this->redirect('default/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $User = $form->save();

      $this->redirect('default/edit?id='.$User->getId());
    }
  }
}
