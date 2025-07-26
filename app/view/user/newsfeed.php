

<div class="container mt-4">
  <div class="row">
    <!-- POST FORM -->
    <div class="col-md-8 mx-auto mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Create a Post</h5>
          <form action="post-handler.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <textarea name="content" class="form-control" rows="3" placeholder="What's on your mind?" required></textarea>
            </div>
            <div class="mb-3">
              <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Post</button>
          </form>
        </div>
      </div>
    </div>

    
</div>


