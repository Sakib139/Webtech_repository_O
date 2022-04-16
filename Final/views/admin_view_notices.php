<div class="row" style="margin-bottom: 20px;">
	<div class="card" style="max-width: 950px; margin-left: 10px; margin-right: 10px">
		<h2>View Teachers</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Notice Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($notices as $notice){
				?>
				<tr>
					<td><?=$notice['title']?></td>
					<td><?=$notice['description']?></td>
					<td><?=date('d-M-Y', strtotime($notice['created_at']))?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Notice Date</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php include 'admin_sidebar.php'?>
</div>