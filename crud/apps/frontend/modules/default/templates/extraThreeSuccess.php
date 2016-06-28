<h1>Students List</h1>

<table>
  <thead>
    <tr>
      <th>Teacher</th>
      <th>Students</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($teachers as $teacher): ?>
    <tr>
      <td><?php echo $teacher['NAME']; ?></td>
      <td><?php echo $teacher['students_count']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>