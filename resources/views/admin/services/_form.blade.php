@csrf

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title ?? '') }}" required placeholder="e.g. Web Development">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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

<div class="mb-3">
    <label for="short_description" class="form-label fw-semibold">Short Description</label>
    <input id="short_description" name="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description', $service->short_description ?? '') }}" placeholder="Brief one-liner shown in listings" maxlength="500">
    <div class="form-text">Optional. Max 500 characters. Shown on homepage/cards.</div>
    @error('short_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Full Description <span class="text-danger">*</span></label>
    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required placeholder="Detailed description of the service...">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check form-switch mb-4">
    <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1" @checked(old('is_active', $service->is_active ?? true))>
    <label class="form-check-label" for="is_active">Active (visible on the website)</label>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Service</button>
    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
