<h5>User Accounts</h5>

<!-- add new user -->
<a href="<?php echo base_url() . 'user/create'; ?>" class="btn blue medium">Add New User</a>

<?php if ($users->num_rows() <= 0) { ?>
<div class="notice warning"><i class="icon-warning-sign icon-large"></i> There are no user accounts in the database.<a href="#close" class="icon-remove"></a></div>
<?php } else { $i=1; ?>
<p>Below are the user accounts in the database:</p>
<table class="table">
	<thead>
		<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Type of User</th>
				<th>Username</th>
				<th>Contact Person</th>
				<th>Active</th>
				<th>Admin</th>
				<th style="text-align: center;">Action(s)</th>
			</tr>
		</thead>
	</thead>
	<tbody>
		<?php foreach ($users->result() as $user): ?>
		<tr>
			<td><?php echo $i; ?>.</td>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->user_type; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->contact_person; ?></td>
			<td><?php echo $user->active; ?></td>
			<td><?php echo $user->is_admin; ?></td>
			<td style="text-align: center;"><a href="<?php echo base_url() . 'user/edit/' . $user->id; ?>">Edit</a> | <a href="<?php echo base_url() . 'user/delete/' . $user->id; ?>" onclick="return confirm('Are you sure you wish to delete this user account?');">Delete</a></td>
		</tr>
		<?php $i++; endforeach ?>
	</tbody>
</table>
<?php } ?>