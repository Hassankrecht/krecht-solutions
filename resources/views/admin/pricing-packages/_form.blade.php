@csrf

<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $pricingPackage->name ?? '') }}" required placeholder="e.g. Basic, Pro, Enterprise">
            @error('name')
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

<div class="mb-3">
    <label for="price" class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
    <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror"
        value="{{ old('price', $pricingPackage->price ?? '') }}" required placeholder="e.g. $99/mo, Free, Contact Us">
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="features" class="form-label fw-semibold">Features</label>
    <textarea id="features" name="features" class="form-control @error('features') is-invalid @enderror" rows="8"
        placeholder="One feature per line, e.g.:&#10;5 Projects&#10;10 GB Storage&#10;Email Support">{{ old('features', isset($pricingPackage) && is_array($pricingPackage->features) ? implode("\n", $pricingPackage->features) : '') }}</textarea>
    <div class="form-text">Enter one feature per line.</div>
    @error('features')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
