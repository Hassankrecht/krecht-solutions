@php
  $pricingPackages = $pricingPackages ?? $packages ?? collect();
  $pricingCategories = collect($pricingCategories ?? \App\Models\PricingPackage::categories())
    ->filter(fn ($category) => $pricingPackages->where('category', $category)->count() > 0)
    ->values();
@endphp

@if($pricingPackages && $pricingPackages->count() > 0)
  <ul class="nav nav-pills pricing-category-nav justify-content-center mb-5" role="tablist">
    @foreach($pricingCategories as $index => $category)
      <li class="nav-item" role="presentation">
        <button
          class="nav-link {{ $index === 0 ? 'active' : '' }}"
          id="pricing-tab-{{ Str::slug($category) }}"
          data-bs-toggle="pill"
          data-bs-target="#pricing-panel-{{ Str::slug($category) }}"
          type="button"
          role="tab"
          aria-controls="pricing-panel-{{ Str::slug($category) }}"
          aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
        >
          {{ $category }}
        </button>
      </li>
    @endforeach
  </ul>

  <div class="tab-content pricing-category-content">
  @foreach($pricingCategories as $categoryIndex => $category)
    @php
      $categoryPackages = $pricingPackages->where('category', $category)->sortBy('order');
    @endphp

    @if($categoryPackages->count() > 0)
      <div
        class="tab-pane fade {{ $categoryIndex === 0 ? 'show active' : '' }}"
        id="pricing-panel-{{ Str::slug($category) }}"
        role="tabpanel"
        aria-labelledby="pricing-tab-{{ Str::slug($category) }}"
        tabindex="0"
      >
      <div class="category-section mb-5">
        <h3 class="category-title text-center mb-4">{{ $category }}</h3>
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
                    <span>{{ __('messages.pricing_choose_plan') }}</span>{{ $amount }}
                  @else
                    {{ $isComingSoon ? __('messages.portfolio_coming_soon') : $package->price }}
                  @endif
                </h4>

                @if(is_array($package->features) && count($package->features) > 0)
                  <ul>
                    @foreach($package->features as $feature)
                      <li><i class="bi bi-check"></i> <span>{{ $feature }}</span></li>
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
@else
  <div class="row">
    <div class="col-12 text-center">
      <p>{{ __('messages.pricing_no_packages') }}</p>
    </div>
  </div>
@endif
