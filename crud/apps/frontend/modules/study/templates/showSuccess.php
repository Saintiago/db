<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Study->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Study->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('study/edit?id='.$Study->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('study/index') ?>">List</a>
