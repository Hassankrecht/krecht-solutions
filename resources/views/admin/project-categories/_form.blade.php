@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_en" class="form-label fw-semibold">Name (English) <span class="text-danger">*</span></label>
            <input id="name_en" name="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror"
                value="{{ old('name_en', $projectCategory->name_en ?? '') }}" required placeholder="e.g. Websites">
            @error('name_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name_ar" class="form-label fw-semibold">Name (Arabic)</label>
            <input id="name_ar" name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror"
                value="{{ old('name_ar', $projectCategory->name_ar ?? '') }}" placeholder="مثال: مواقع الويب" dir="rtl">
            @error('name_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
            <input id="sort_order" name="sort_order" type="number" min="0" class="form-control @error('sort_order') is-invalid @enderror"
                value="{{ old('sort_order', $projectCategory->sort_order ?? 0) }}">
            <div class="form-text">Lower numbers appear first.</div>
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check form-switch mt-4">
                <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
                    @checked(old('is_active', $projectCategory->is_active ?? true))>
                <label class="form-check-label" for="is_active">Active (visible on the website)</label>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">Save Category</button>
    <a href="{{ route('admin.project-categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
