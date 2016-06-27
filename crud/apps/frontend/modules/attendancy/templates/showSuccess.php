<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $LectureAttendancy->getId() ?></td>
    </tr>
    <tr>
      <th>Lecture:</th>
      <td><?php echo $LectureAttendancy->getLectureId() ?></td>
    </tr>
    <tr>
      <th>Student:</th>
      <td><?php echo $LectureAttendancy->getStudentId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('attendancy/edit?id='.$LectureAttendancy->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('attendancy/index') ?>">List</a>
