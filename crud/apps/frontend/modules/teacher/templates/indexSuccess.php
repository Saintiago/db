<h1>Teachers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Teachers as $Teacher): ?>
    <tr>
      <td><a href="<?php echo url_for('teacher/show?id='.$Teacher->getId()) ?>"><?php echo $Teacher->getId() ?></a></td>
      <td><?php echo $Teacher->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('teacher/new') ?>">New</a>
