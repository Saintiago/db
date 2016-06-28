<h1>Students List</h1>

<table>
  <thead>
    <tr>
      <th>Student</th>
      <th>Teachers</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $student): ?>
    <tr>
      <td><?php echo $student['NAME']; ?></td>
      <td><?php echo $student['teachers']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>