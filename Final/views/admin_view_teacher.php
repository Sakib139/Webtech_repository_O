<div class="row" style="margin-bottom: 20px;">
	<div class="card" style="max-width: 950px; margin-left: 10px; margin-right: 10px">
		<h2>View Teachers</h2>
		<table class="table">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Date of Birth</th>
					<th>Blood Group</th>
					<th>Present Address</th>
					<th>Permanent Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($teachers as $teacher){
				?>
				<tr>
					<td><?=$teacher['first_name']?></td>
					<td><?=$teacher['last_name']?></td>
					<td><?=$teacher['email']?></td>
					<td><?=$teacher['username']?></td>
					<td><?=ucfirst($teacher['gender'])?></td>
					<td><?=date('d-M-Y', strtotime($teacher['date_of_birth']))?></td>
					<td><?=$teacher['blood_group']?></td>
					<td><?=$teacher['present_address']?></td>
					<td><?=$teacher['permanent_address']?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Date of Birth</th>
					<th>Blood Group</th>
					<th>Present Address</th>
					<th>Permanent Address</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php include 'admin_sidebar.php'?>
</div>