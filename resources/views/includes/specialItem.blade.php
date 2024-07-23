      <!-- Special Items Page -->
      <div id="special" class="tm-page-content">
        <div class="tm-special-items">
            @foreach($specialItems as $specialItem)
          <div class="tm-black-bg tm-special-item">
            <img src="{{ asset('assets2/images/' .$specialItem->image) }}" alt="Image" width="300px">
            <div class="tm-special-item-description">
              <h2 class="tm-text-primary tm-special-item-title">{{ $specialItem->name }}</h2>
              <p class="tm-special-item-text">{{ $specialItem->content }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- end Special Items Page -->
