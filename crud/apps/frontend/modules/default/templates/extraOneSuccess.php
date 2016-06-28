<h1>Students List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $student): ?>
    <tr>
      <td><a href="<?php echo url_for('student/show?id='.$student->getId()) ?>"><?php echo $student->getId() ?></a></td>
      <td><?php echo $student->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>