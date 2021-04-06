  <!-- RBSlideshow -->
  <div class="slideshow">

      <div id="RBSlideshow">
          <ul>
              @foreach ($images as $item)
                  <li><img src="{{ asset($folder . '/' . $item->url) }}" alt="image" /></li>
              @endforeach
          </ul>
      </div>
      <div id="slideshow">
          <div id="slides">

              <div id="prevSlide">
                  <p></p>
              </div>
              <div id="currentSlide">
                  <p></p>
              </div>
              <div id="nextSlide">
                  <p></p>
              </div>
          </div>
      </div>
      <button class="btn btn-danger btn-sm" id="close-slideshow">
          <i class="fa fa-times"></i>
      </button>
  </div>
  <!-- end of RBSlideshow -->
