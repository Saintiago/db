<h1>LectureSchedules List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Teacher</th>
      <th>Study</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LectureSchedules as $LectureSchedule): ?>
    <tr>
      <td><a href="<?php echo url_for('schedule/show?id='.$LectureSchedule->getId()) ?>"><?php echo $LectureSchedule->getId() ?></a></td>
      <td><?php echo $LectureSchedule->getTeacherId() ?></td>
      <td><?php echo $LectureSchedule->getStudyId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('schedule/new') ?>">New</a>
