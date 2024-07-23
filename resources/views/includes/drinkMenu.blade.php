<!-- Drink Menu Page -->
<nav class="tm-black-bg tm-drinks-nav">
    <ul>
        @foreach($categories as $category)
        <li>
            <a href="#" class="tm-tab-link {{ $loop->first ? 'active' : '' }}" data-id="category-{{ $category->id }}">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</nav>
@foreach($categories as $category)
    <div id="category-{{ $category->id }}" class="tm-tab-content">
        <div class="tm-list">
            @php
                $beverages = \App\Models\Beverage::where('category_id', $category->id)->get();
            @endphp
            @foreach($beverages as $beverage)
                <div class="tm-list-item">
                    <img src="{{ asset('assets2/images/' . $beverage->image) }}" alt="Image" class="tm-list-item-img">
                    <div class="tm-black-bg tm-list-item-text">
                        <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">${{ $beverage->price }}</span></h3>
                        <p class="tm-list-item-description">{{ $beverage->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
<!-- end Drink Menu Page -->
