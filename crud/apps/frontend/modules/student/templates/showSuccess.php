<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Student->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Student->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('student/edit?id='.$Student->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('student/index') ?>">List</a>
