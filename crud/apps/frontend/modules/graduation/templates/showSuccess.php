<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Graduation->getId() ?></td>
    </tr>
    <tr>
      <th>Grade:</th>
      <td><?php echo $Graduation->getGrade() ?></td>
    </tr>
    <tr>
      <th>Student:</th>
      <td><?php echo $Graduation->getStudentId() ?></td>
    </tr>
    <tr>
      <th>Study:</th>
      <td><?php echo $Graduation->getStudyId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('graduation/edit?id='.$Graduation->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('graduation/index') ?>">List</a>
