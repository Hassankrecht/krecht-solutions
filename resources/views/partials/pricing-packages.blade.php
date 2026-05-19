@php
  $pricingPackages = $pricingPackages ?? $packages ?? collect();
  $pricingCategories = collect($pricingCategories ?? \App\Models\PricingCategory::active()->ordered()->get())
    ->filter(fn ($category) => $pricingPackages->where('pricing_category_id', $category->id)->count() > 0)
    ->values();
@endphp

@if($pricingPackages && $pricingPackages->count() > 0)
  <ul class="nav nav-pills pricing-category-nav justify-content-center mb-5" role="tablist">
    @foreach($pricingCategories as $index => $category)
      <li class="nav-item" role="presentation">
        <button
          class="nav-link {{ $index === 0 ? 'active' : '' }}"
          id="pricing-tab-{{ Str::slug($category->name_en) }}"
          data-bs-toggle="pill"
          data-bs-target="#pricing-panel-{{ Str::slug($category->name_en) }}"
          type="button"
          role="tab"
          aria-controls="pricing-panel-{{ Str::slug($category->name_en) }}"
          aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
        >
          {{ $category->name }}
        </button>
      </li>
    @endforeach
  </ul>

  <div class="tab-content pricing-category-content">
  @foreach($pricingCategories as $categoryIndex => $category)
    @php
      $categoryPackages = $pricingPackages->where('pricing_category_id', $category->id)->sortBy('order');
    @endphp

    @if($categoryPackages->count() > 0)
      <div
        class="tab-pane fade {{ $categoryIndex === 0 ? 'show active' : '' }}"
        id="pricing-panel-{{ Str::slug($category->name_en) }}"
        role="tabpanel"
        aria-labelledby="pricing-tab-{{ Str::slug($category->name_en) }}"
        tabindex="0"
      >
      <div class="category-section mb-5">
        <h3 class="category-title text-center mb-4">{{ $category->name }}</h3>
        <div class="row gy-4">
          @foreach($categoryPackages as $index => $package)
            @php
              $isComingSoon = strcasecmp($package->price, 'Coming Soon') === 0;
              $startsFrom = str_starts_with($package->price, 'Starting from ');
              $amount = $startsFrom ? trim(str_replace('Starting from ', '', $package->price)) : $package->price;
              $isPriceLabel = $isComingSoon || strcasecmp($package->price, 'Custom Quote') === 0;
            @endphp
            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
              <div class="pricing-item {{ $package->is_featured ? 'featured' : '' }} {{ $isComingSoon ? 'coming-soon' : '' }}">
                <h3>{{ $package->name }}</h3>
                <h4 class="{{ $isPriceLabel ? 'price-label' : '' }}">
                  @if($startsFrom)
                    <span class="starting-from">Starting from</span> {{ $amount }}
                  @else
                    {{ $isComingSoon ? __('messages.portfolio_coming_soon') : $package->price }}
                  @endif
                </h4>

                @if(is_array($package->features_en) && count($package->features_en) > 0)
                  @if(count($package->features_en) > 5)
                  <button class="show-more-features btn btn-sm btn-outline-secondary w-100 mb-2">
                    <span class="show-text">Show More Features</span>
                    <span class="hide-text d-none">Show Less</span>
                    <i class="bi bi-chevron-down ms-1"></i>
                  </button>
                  @endif
                  <ul class="features-list">
                    @foreach($package->features_en as $index => $feature)
                      <li class="{{ $index >= 5 ? 'feature-hidden' : '' }}"><i class="bi bi-check"></i> <span>{{ $feature }}</span></li>
                    @endforeach
                  </ul>
                @endif

                <a href="{{ route('contact') }}" class="buy-btn">{{ $isComingSoon ? __('messages.cta_button') : __('messages.nav_get_started') }}</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      </div>
    @endif
  @endforeach
  </div>

  <div class="support-note mt-5 text-center">
    <p class="text-muted small mb-0">
      <em>{{ __('messages.pricing_support_note') }}</em>
    </p>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const showMoreButtons = document.querySelectorAll('.show-more-features');

    showMoreButtons.forEach(button => {
      button.addEventListener('click', function() {
        const featuresList = this.nextElementSibling;
        const allFeatures = featuresList.querySelectorAll('li');
        const showText = this.querySelector('.show-text');
        const hideText = this.querySelector('.hide-text');
        const icon = this.querySelector('.bi-chevron-down');

        if (this.classList.contains('expanded')) {
          // Show less - hide features after 5th
          allFeatures.forEach((feature, index) => {
            if (index >= 5) {
              feature.classList.add('feature-hidden');
            }
          });
          showText.classList.remove('d-none');
          hideText.classList.add('d-none');
          this.classList.remove('expanded');
          icon.style.transform = 'rotate(0deg)';
        } else {
          // Show more - show all features
          allFeatures.forEach(feature => {
            feature.classList.remove('feature-hidden');
          });
          showText.classList.add('d-none');
          hideText.classList.remove('d-none');
          this.classList.add('expanded');
          icon.style.transform = 'rotate(180deg)';
        }
      });
    });
  });
  </script>
@else
  <div class="row">
    <div class="col-12 text-center">
      <p>{{ __('messages.pricing_no_packages') }}</p>
    </div>
  </div>
@endif
