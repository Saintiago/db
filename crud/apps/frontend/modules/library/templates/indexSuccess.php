<h1>LibraryRecords List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Book</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LibraryRecords as $LibraryRecord): ?>
    <tr>
      <td><a href="<?php echo url_for('library/show?id='.$LibraryRecord->getId()) ?>"><?php echo $LibraryRecord->getId() ?></a></td>
      <td><?php echo $LibraryRecord->getName() ?></td>
      <td><?php echo $LibraryRecord->getBookId() ?></td>
      <td><?php echo $LibraryRecord->getQuantity() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('library/new') ?>">New</a>
