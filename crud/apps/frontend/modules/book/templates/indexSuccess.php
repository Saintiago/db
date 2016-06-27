<h1>Books List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Books as $Book): ?>
    <tr>
      <td><a href="<?php echo url_for('book/show?id='.$Book->getId()) ?>"><?php echo $Book->getId() ?></a></td>
      <td><?php echo $Book->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('book/new') ?>">New</a>
