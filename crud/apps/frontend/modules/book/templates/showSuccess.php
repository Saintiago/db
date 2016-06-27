<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Book->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Book->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('book/edit?id='.$Book->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('book/index') ?>">List</a>
