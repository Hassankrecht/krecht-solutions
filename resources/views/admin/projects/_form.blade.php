@csrf

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $project->title ?? '') }}" required placeholder="e.g. Albasha Restaurant">
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
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
        rows="4" placeholder="Project description...">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- ── Featured Image ─────────────────────────────────────────── --}}
<div class="card mb-3">
    <div class="card-header fw-semibold py-2">Featured Image</div>
    <div class="card-body">
        @if(isset($project) && $project->image)
            <div class="mb-3 d-flex align-items-start gap-3">
                <img src="{{ asset($project->image) }}" alt="Current image"
                     style="max-height:100px;max-width:180px;object-fit:cover;" class="rounded border">
                <div>
                    <div class="small text-muted mb-1"><code>{{ $project->image }}</code></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1"
                               {{ old('remove_image') ? 'checked' : '' }}>
                        <label class="form-check-label text-danger small" for="remove_image">Remove current image</label>
                    </div>
                </div>
            </div>
        @endif

        <div class="mb-2">
            <label class="form-label small text-muted mb-1">Upload new image (max 10 MB)</label>
            <input type="file" name="image_upload" accept="image/*"
                   class="form-control form-control-sm @error('image_upload') is-invalid @enderror">
            @error('image_upload')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="form-label small text-muted mb-1">— or enter relative path from <code>public/</code></label>
            <input name="image" type="text"
                   class="form-control form-control-sm @error('image') is-invalid @enderror"
                   value="{{ old('image', isset($project) ? ($project->image ?? '') : '') }}"
                   placeholder="assets/projects/Albasha restaurant/hero.png">
            <div class="form-text">Uploaded file takes priority over the path field.</div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

{{-- ── Gallery Images ──────────────────────────────────────────── --}}
<div class="card mb-3">
    <div class="card-header fw-semibold py-2">Gallery Images</div>
    <div class="card-body">
        @if(isset($project) && $project->gallery_images && count($project->gallery_images) > 0)
            <p class="small text-muted mb-2">Existing gallery — check to remove individual images:</p>
            <div class="row g-2 mb-3">
                @foreach($project->gallery_images as $galleryImg)
                    <div class="col-auto">
                        <div class="text-center" style="width:90px;">
                            <img src="{{ asset($galleryImg) }}" alt=""
                                 style="height:70px;width:90px;object-fit:cover;" class="rounded border d-block mb-1">
                            <div class="form-check form-check-inline m-0">
                                <input class="form-check-input" type="checkbox"
                                       name="remove_gallery[]" value="{{ $galleryImg }}"
                                       id="rg_{{ md5($galleryImg) }}">
                                <label class="form-check-label text-danger" style="font-size:11px;"
                                       for="rg_{{ md5($galleryImg) }}">Remove</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <label class="form-label small text-muted mb-1">Upload new gallery images (hold Ctrl/⌘ for multiple)</label>
        <input type="file" name="gallery_upload[]" accept="image/*" multiple
               class="form-control form-control-sm @error('gallery_upload.*') is-invalid @enderror">
        <div class="form-text">Max 10 MB per image. New uploads are <em>appended</em> to the existing gallery.</div>
        @error('gallery_upload.*')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- ── Video ───────────────────────────────────────────────────── --}}
<div class="card mb-3">
    <div class="card-header fw-semibold py-2">Project Video <span class="text-muted fw-normal small">(optional)</span></div>
    <div class="card-body">
        @if(isset($project) && $project->video)
            <div class="mb-2">
                <span class="small text-muted">Current: </span>
                <code class="small">{{ $project->video }}</code>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" name="remove_video" id="remove_video" value="1"
                           {{ old('remove_video') ? 'checked' : '' }}>
                    <label class="form-check-label text-danger small" for="remove_video">Remove current video</label>
                </div>
            </div>
        @endif

        <div class="mb-2">
            <label class="form-label small text-muted mb-1">Upload new video (mp4/webm/avi/mov, max 200 MB)</label>
            <input type="file" name="video_upload" accept="video/*"
                   class="form-control form-control-sm @error('video_upload') is-invalid @enderror">
            @error('video_upload')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="form-label small text-muted mb-1">— or enter relative path / external URL</label>
            <input name="video" type="text"
                   class="form-control form-control-sm @error('video') is-invalid @enderror"
                   value="{{ old('video', isset($project) ? ($project->video ?? '') : '') }}"
                   placeholder="assets/projects/Albasha restaurant/Albasha videos show.mp4">
            <div class="form-text">Uploaded file takes priority over the path field.</div>
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
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
