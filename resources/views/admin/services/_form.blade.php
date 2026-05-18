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
        <div class="mb-3">
            <label for="title_en" class="form-label fw-semibold">Title (English) <span class="text-danger">*</span></label>
            <input id="title_en" name="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $service->title_en ?? '') }}" required placeholder="e.g. Web Development">
            @error('title_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="short_description_en" class="form-label fw-semibold">Short Description (English)</label>
            <input id="short_description_en" name="short_description_en" type="text" class="form-control @error('short_description_en') is-invalid @enderror" value="{{ old('short_description_en', $service->short_description_en ?? '') }}" placeholder="Brief one-liner shown in listings" maxlength="500">
            <div class="form-text">Optional. Max 500 characters. Shown on homepage/cards.</div>
            @error('short_description_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_en" class="form-label fw-semibold">Full Description (English) <span class="text-danger">*</span></label>
            <textarea id="description_en" name="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="6" required placeholder="Detailed description of the service...">{{ old('description_en', $service->description_en ?? '') }}</textarea>
            @error('description_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="ar" role="tabpanel">
        <div class="mb-3">
            <label for="title_ar" class="form-label fw-semibold">Title (Arabic)</label>
            <input id="title_ar" name="title_ar" type="text" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $service->title_ar ?? '') }}" placeholder="مثال: تطوير المواقع الإلكترونية" dir="rtl">
            @error('title_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="short_description_ar" class="form-label fw-semibold">Short Description (Arabic)</label>
            <input id="short_description_ar" name="short_description_ar" type="text" class="form-control @error('short_description_ar') is-invalid @enderror" value="{{ old('short_description_ar', $service->short_description_ar ?? '') }}" placeholder="وصف قصير يظهر في القوائم" maxlength="500" dir="rtl">
            <div class="form-text">Optional. Max 500 characters.</div>
            @error('short_description_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_ar" class="form-label fw-semibold">Full Description (Arabic)</label>
            <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" rows="6" placeholder="وصف تفصيلي للخدمة..." dir="rtl">{{ old('description_ar', $service->description_ar ?? '') }}</textarea>
            @error('description_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label for="icon" class="form-label fw-semibold">Icon Class <span class="text-danger">*</span></label>
            <input id="icon" name="icon" type="text" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon ?? 'bi bi-globe') }}" required placeholder="e.g. bi bi-globe">
            <div class="form-text">Use Bootstrap Icons or Tabler Icons class strings.</div>
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
            <input id="sort_order" name="sort_order" type="number" min="0" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-check form-switch mb-4">
    <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1" @checked(old('is_active', $service->is_active ?? true))>
    <label class="form-check-label" for="is_active">Active (visible on the website)</label>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Service</button>
    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
