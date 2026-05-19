@csrf

<ul class="nav nav-tabs mb-3" id="languageTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-selected="true">English</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="ar-tab" data-bs-toggle="tab" data-bs-target="#ar" type="button" role="tab" aria-selected="false">Arabic</button>
    </li>
</ul>

<div class="tab-content" id="languageTabsContent">
    <div class="tab-pane fade show active" id="en" role="tabpanel">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name_en" class="form-label fw-semibold">Package Name (English) <span class="text-danger">*</span></label>
                    <input id="name_en" name="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror"
                        value="{{ old('name_en', $pricingPackage->name_en ?? '') }}" required placeholder="e.g. Basic, Pro, Enterprise">
                    @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="order" class="form-label fw-semibold">Sort Order</label>
                    <input id="order" name="order" type="number" min="0" class="form-control @error('order') is-invalid @enderror"
                        value="{{ old('order', $pricingPackage->order ?? 0) }}">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pricing_category_id" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select id="pricing_category_id" name="pricing_category_id" class="form-select @error('pricing_category_id') is-invalid @enderror" required>
                        <option value="">Select a category</option>
                        @foreach($categories ?? \App\Models\PricingCategory::active()->ordered()->get() as $category)
                            <option value="{{ $category->id }}" @selected(old('pricing_category_id', $pricingPackage->pricing_category_id ?? '') == $category->id)>
                                {{ $category->name_en }}
                            </option>
                        @endforeach
                    </select>
                    @error('pricing_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                    <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $pricingPackage->price ?? '') }}" required placeholder="e.g. Starting from $999, Coming Soon">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="features_en" class="form-label fw-semibold">Features (English)</label>
            <textarea id="features_en" name="features_en" class="form-control @error('features_en') is-invalid @enderror" rows="8"
                placeholder="One feature per line, e.g.:&#10;5 Projects&#10;10 GB Storage&#10;Email Support">{{ old('features_en', isset($pricingPackage) && is_array($pricingPackage->features_en) ? implode("\n", $pricingPackage->features_en) : '') }}</textarea>
            <div class="form-text">Enter one feature per line.</div>
            @error('features_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="ar" role="tabpanel">
        <div class="mb-3">
            <label for="name_ar" class="form-label fw-semibold">Package Name (Arabic)</label>
            <input id="name_ar" name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror"
                value="{{ old('name_ar', $pricingPackage->name_ar ?? '') }}" placeholder="مثال: أساسي، احترافي، مؤسسي" dir="rtl">
            @error('name_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="features_ar" class="form-label fw-semibold">Features (Arabic)</label>
            <textarea id="features_ar" name="features_ar" class="form-control @error('features_ar') is-invalid @enderror" rows="8"
                placeholder="ميزة واحدة في كل سطر، مثال:&#10;5 مشاريع&#10;10 جيجابايت تخزين&#10;دعم البريد الإلكتروني" dir="rtl">{{ old('features_ar', isset($pricingPackage) && is_array($pricingPackage->features_ar) ? implode("\n", $pricingPackage->features_ar) : '') }}</textarea>
            <div class="form-text">أدخل ميزة واحدة في كل سطر.</div>
            @error('features_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="form-check form-switch">
            <input id="is_featured" name="is_featured" class="form-check-input" type="checkbox" value="1"
                @checked(old('is_featured', $pricingPackage->is_featured ?? false))>
            <label class="form-check-label" for="is_featured">Mark as Featured (highlighted plan)</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-check form-switch">
            <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
                @checked(old('is_active', $pricingPackage->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active (visible on the website)</label>
        </div>
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Package</button>
    <a href="{{ route('admin.pricing-packages.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
