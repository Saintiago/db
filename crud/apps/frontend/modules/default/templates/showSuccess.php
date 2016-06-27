<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $User->getId() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $User->getLogin() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $User->getPassword() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('default/edit?id='.$User->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('default/index') ?>">List</a>
