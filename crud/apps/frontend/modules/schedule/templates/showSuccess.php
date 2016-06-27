<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $LectureSchedule->getId() ?></td>
    </tr>
    <tr>
      <th>Teacher:</th>
      <td><?php echo $LectureSchedule->getTeacherId() ?></td>
    </tr>
    <tr>
      <th>Study:</th>
      <td><?php echo $LectureSchedule->getStudyId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('schedule/edit?id='.$LectureSchedule->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('schedule/index') ?>">List</a>
