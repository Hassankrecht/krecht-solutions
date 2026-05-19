@csrf

<div class="mb-3">
    <label for="name_en" class="form-label fw-semibold">Category Name (English) <span class="text-danger">*</span></label>
    <input id="name_en" name="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror"
        value="{{ old('name_en', $pricingCategory->name_en ?? '') }}" required placeholder="e.g. Web Solutions">
    @error('name_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name_ar" class="form-label fw-semibold">Category Name (Arabic) <span class="text-danger">*</span></label>
    <input id="name_ar" name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror"
        value="{{ old('name_ar', $pricingCategory->name_ar ?? '') }}" required placeholder="مثال: حلول الويب" dir="rtl">
    @error('name_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="order" class="form-label fw-semibold">Sort Order</label>
            <input id="order" name="order" type="number" min="0" class="form-control @error('order') is-invalid @enderror"
                value="{{ old('order', $pricingCategory->order ?? 0) }}">
            @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check form-switch mt-4">
                <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
                    @checked(old('is_active', $pricingCategory->is_active ?? true))>
                <label class="form-check-label" for="is_active">Active (visible on the website)</label>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Category</button>
    <a href="{{ route('admin.pricing-categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
