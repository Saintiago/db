<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Teacher->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Teacher->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('teacher/edit?id='.$Teacher->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('teacher/index') ?>">List</a>
