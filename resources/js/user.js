$(document).ready( function () {
    $('#demo_table').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "{{ route('ajax.posts.index') }}",
      "columns": [
        { "data": "id" },
        { "data": "title" },
        { "data": "user_name" },
        { "data": "comments_num" },
      ]
    });
  } );