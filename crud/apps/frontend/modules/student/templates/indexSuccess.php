<h1>Students List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Students as $Student): ?>
    <tr>
      <td><a href="<?php echo url_for('student/show?id='.$Student->getId()) ?>"><?php echo $Student->getId() ?></a></td>
      <td><?php echo $Student->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('student/new') ?>">New</a>
