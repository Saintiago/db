<h1>LectureAttendancys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Lecture</th>
      <th>Student</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LectureAttendancys as $LectureAttendancy): ?>
    <tr>
      <td><a href="<?php echo url_for('attendancy/show?id='.$LectureAttendancy->getId()) ?>"><?php echo $LectureAttendancy->getId() ?></a></td>
      <td><?php echo $LectureAttendancy->getLectureId() ?></td>
      <td><?php echo $LectureAttendancy->getStudentId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('attendancy/new') ?>">New</a>
