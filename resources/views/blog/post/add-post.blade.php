@extends('blog.dashboard.app')

@section('title', 'Manage-Post')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
      <h1 class="h2">Add New Blog Post</h1>

      <!-- Form Section -->
      <div class="container mt-4">
        <form action="{{ route('save.post') }}" method="post" id="addPostForm" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title">
          </div>

          <div class="mb-3">
            <label for="tag" class="form-label">Tags</label>
            <select class="form-control" id="tag" name="tag[]" multiple>
              
            </select>
          </div>

          <!-- Optional: Image Upload -->
          <!--
          <div class="mb-3">
            <label for="image" class="form-label">Feature Image</label>
            <input class="form-control" type="file" id="image" name="image">
          </div>
          -->

          <div class="mb-3">
            <label for="description" class="form-label">Post Description</label>
            <textarea class="form-control" id="description" name="description" rows="8" placeholder="Write your content..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Publish Post</button>
          <a href="#" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </main>

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "{{ route('get.tags') }}",

                success: function(response) {

                    $('#tag').empty();

                    $('#tag').append('<option disabled>Select Tag</option>');

                    $.each(response, function(index, tags) {
                        $('#tag').append('<option value="' + tags.id + '">' + tags.tag +
                            '</option>');
                    });

                }
            });
        });

        $(document).ready(function() {
            $("#addPostForm").on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const formData = form.serialize();

                const url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function(response) {
                        notyf.success(response.msg);

                        setTimeout(function() {
                            window.location.href = "{{ route('dashboard') }}";
                        }, 1500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            notyf.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>

@endsection
