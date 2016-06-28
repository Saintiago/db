<h1>Tables</h1>

<ul>
  <li><a href="<?php echo url_for('student/index'); ?>">Students</a></li>
  <li><a href="<?php echo url_for('book/index'); ?>">Books</a></li>
  <li><a href="<?php echo url_for('teacher/index'); ?>">Teachers</a></li>
  <li><a href="<?php echo url_for('study/index'); ?>">Studies</a></li>
  <li><a href="<?php echo url_for('library/index'); ?>">Library</a></li>
  <li><a href="<?php echo url_for('schedule/index'); ?>">Schedule</a></li>
  <li><a href="<?php echo url_for('attendancy/index'); ?>">Attendancy</a></li>
  <li><a href="<?php echo url_for('graduation/index'); ?>">Graduation</a></li>
  <li><a href="<?php echo url_for('default/index'); ?>">Users</a></li>
</ul>

<h2>Extra Queries</h2>
<ul>
  <li><a href="<?php echo url_for('@extra_one'); ?>">Spisok studentov kotorye brali knigu XXX</a></li>
  <li><a href="<?php echo url_for('@extra_two'); ?>">Dlja kazhdogo studenta perechislit' cherez zapjatuju imena uchitelej (group concat)</a></li>
  <li><a href="<?php echo url_for('@extra_three'); ?>">Dlja kazhdogo uchitelja poschitat' kolichestvo unikal'nyh obuchennyh studentov, otsortirovat' po kol-vu</a></li>
</ul>
