@csrf

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $project->title ?? '') }}" required placeholder="e.g. E-Commerce Platform">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label for="category" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
            <input id="category" name="category" type="text" class="form-control @error('category') is-invalid @enderror"
                value="{{ old('category', $project->category ?? '') }}" required placeholder="e.g. Web Development">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="order" class="form-label fw-semibold">Sort Order</label>
            <input id="order" name="order" type="number" min="0" class="form-control @error('order') is-invalid @enderror"
                value="{{ old('order', $project->order ?? 0) }}">
            @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="technologies" class="form-label fw-semibold">Technologies</label>
    <input id="technologies" name="technologies" type="text" class="form-control @error('technologies') is-invalid @enderror"
        value="{{ old('technologies', $project->technologies ?? '') }}"
        placeholder="e.g. Laravel, Vue.js, MySQL">
    <div class="form-text">Comma-separated list of technologies used.</div>
    @error('technologies')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label fw-semibold">Image URL</label>
    <input id="image" name="image" type="text" class="form-control @error('image') is-invalid @enderror"
        value="{{ old('image', $project->image ?? '') }}"
        placeholder="e.g. assets/images/portfolio/project1.jpg">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
        rows="5" placeholder="Project description...">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check form-switch mb-4">
    <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
        @checked(old('is_active', $project->is_active ?? true))>
    <label class="form-check-label" for="is_active">Active (visible on the website)</label>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Project</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
