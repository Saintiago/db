<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Login</th>
      <th>Password</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Users as $User): ?>
    <tr>
      <td><a href="<?php echo url_for('default/show?id='.$User->getId()) ?>"><?php echo $User->getId() ?></a></td>
      <td><?php echo $User->getLogin() ?></td>
      <td><?php echo $User->getPassword() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('default/new') ?>">New</a>
