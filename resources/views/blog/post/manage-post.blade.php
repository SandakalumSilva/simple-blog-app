@extends('blog.dashboard.app')

@section('title', 'Manage-Post')
@section('content')

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <h2 class="mb-4">Manage Posts</h2>

        <table class="table table-bordered table-hover" id="allPosts">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>

    <!-- Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="statusModalLabel">Change Post Status</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="statusForm" action="{{ route('change.post.status') }}" method="POST">
                        @csrf
                        <input type="hidden" id="statusPostId" name="post_id">

                        <div class="mb-3">
                            <label for="postStatus" class="form-label">Select Status</label>
                            <select class="form-select" id="postStatus" name="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="statusForm" class="btn btn-primary">Update Status</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            const allPostsTable = $('#allPosts').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('manage.post') }}',
                columns: [{
                        data: null,
                        name: 'index',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author_name',
                        name: 'author_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            let badgeClass = 'bg-secondary';
                            if (data === 'approved') badgeClass = 'bg-success';
                            else if (data === 'pending') badgeClass = 'bg-warning';
                            else if (data === 'rejected') badgeClass = 'bg-danger';

                            return `<span class="badge ${badgeClass} text-capitalize">${data}</span>`;
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]

            });

            $(document).on('click', '.status-post', function() {
                const status = $(this).siblings('.post-status').val();
                const id = $(this).data('id');

                $('#statusPostId').val(id);
                $('#postStatus').val(status);

                $('#statusModal').modal('show');

            });

            $('#statusForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const formData = form.serialize();
                const url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function(response) {
                        $('#statusModal').modal('hide');
                        notyf.success(response.msg);

                        form[0].reset();

                        // Reload DataTable
                        allPostsTable.ajax.reload(null, false);
                    }
                });
            });
        });
    </script>

@endsection
