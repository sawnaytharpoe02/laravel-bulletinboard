<table class="table">
  <!-- head -->
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Date of birth</th>
      <th>Address</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <x-user-row :user="$user" />
    @endforeach
</table>