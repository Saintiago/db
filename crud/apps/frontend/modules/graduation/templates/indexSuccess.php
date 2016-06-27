<h1>Graduations List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Grade</th>
      <th>Student</th>
      <th>Study</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Graduations as $Graduation): ?>
    <tr>
      <td><a href="<?php echo url_for('graduation/show?id='.$Graduation->getId()) ?>"><?php echo $Graduation->getId() ?></a></td>
      <td><?php echo $Graduation->getGrade() ?></td>
      <td><?php echo $Graduation->getStudentId() ?></td>
      <td><?php echo $Graduation->getStudyId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('graduation/new') ?>">New</a>
