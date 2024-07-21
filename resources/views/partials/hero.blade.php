<style>
  .custom-img-size {
    max-width: 100%; /* Ensures the image does not exceed the container's width */
    height: auto; /* Maintains aspect ratio */
    width: 65%; /* Adjust this percentage to fit your design needs */
  }
</style>

<!-- Blog Hero Section -->
<section class="py-3 py-lg-4 py-xl-4">
  <div class="container overflow-hidden">
    <div class="row gy-5 gy-lg-0 align-items-lg-center justify-content-lg-between">
      <div class="col-12 col-lg-6 order-1 order-lg-0">
        <h2 class="display-3 fw-bold mb-3">Welcome to Our Blog: Insights on AI and Web 3.0</h2>
        <p class="fs-4 mb-5">Stay updated with the latest trends and in-depth articles on Artificial Intelligence and the future of the Web.</p>
        <div class="d-grid gap-2 d-sm-flex">
          <button type="button" class="btn btn-primary bsb-btn-2xl rounded-pill">Read Latest Posts</button>
          <button type="button" class="btn btn-outline-primary bsb-btn-2xl rounded-pill">Register Now</button>
        </div>
      </div>
      <div class="col-12 col-lg-5 text-center">
        <div class="position-relative">
          <div class="bsb-circle border border-4 border-warning position-absolute top-50 start-10 translate-middle z-1"></div>
          <div class="bsb-circle bg-primary position-absolute top-50 start-50 translate-middle" style="--bsb-cs: 460px;"></div>
          <div class="bsb-circle border border-4 border-warning position-absolute top-10 end-0 z-1" style="--bsb-cs: 100px;"></div>
          <img class="img-fluid position-relative z-2 custom-img-size" loading="lazy" src="{{ asset('images/blog.png') }}" alt="Welcome to Our Blog: Insights on AI and Web 3.0">
        </div>
      </div>
    </div>
  </div>
</section>
