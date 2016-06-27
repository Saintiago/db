<h1>Studys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Studys as $Study): ?>
    <tr>
      <td><a href="<?php echo url_for('study/show?id='.$Study->getId()) ?>"><?php echo $Study->getId() ?></a></td>
      <td><?php echo $Study->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('study/new') ?>">New</a>
