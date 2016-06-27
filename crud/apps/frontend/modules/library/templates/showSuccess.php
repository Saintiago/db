<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $LibraryRecord->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $LibraryRecord->getName() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $LibraryRecord->getBookId() ?></td>
    </tr>
    <tr>
      <th>Quantity:</th>
      <td><?php echo $LibraryRecord->getQuantity() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('library/edit?id='.$LibraryRecord->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('library/index') ?>">List</a>
