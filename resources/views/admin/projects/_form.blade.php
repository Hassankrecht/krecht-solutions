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
            <input id="title_en" name="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror"
                value="{{ old('title_en', $project->title_en ?? '') }}" required placeholder="e.g. Albasha Restaurant">
            @error('title_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="category_en" class="form-label fw-semibold">Category (English) <span class="text-danger">*</span></label>
                    <input id="category_en" name="category_en" type="text" class="form-control @error('category_en') is-invalid @enderror"
                        value="{{ old('category_en', $project->category_en ?? '') }}" required placeholder="e.g. Web Development">
                    @error('category_en')
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
            <label for="technologies_en" class="form-label fw-semibold">Technologies (English)</label>
            <input id="technologies_en" name="technologies_en" type="text" class="form-control @error('technologies_en') is-invalid @enderror"
                value="{{ old('technologies_en', is_array($project->technologies_en) ? implode(', ', $project->technologies_en) : $project->technologies_en ?? '') }}"
                placeholder="e.g. Laravel, Vue.js, MySQL">
            <div class="form-text">Comma-separated list of technologies used.</div>
            @error('technologies_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_en" class="form-label fw-semibold">Description (English)</label>
            <textarea id="description_en" name="description_en" class="form-control @error('description_en') is-invalid @enderror"
                rows="4" placeholder="Project description...">{{ old('description_en', $project->description_en ?? '') }}</textarea>
            @error('description_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="ar" role="tabpanel">
        <div class="mb-3">
            <label for="title_ar" class="form-label fw-semibold">Title (Arabic)</label>
            <input id="title_ar" name="title_ar" type="text" class="form-control @error('title_ar') is-invalid @enderror"
                value="{{ old('title_ar', $project->title_ar ?? '') }}" placeholder="مثال: مطعم الباشا" dir="rtl">
            @error('title_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_ar" class="form-label fw-semibold">Category (Arabic)</label>
            <input id="category_ar" name="category_ar" type="text" class="form-control @error('category_ar') is-invalid @enderror"
                value="{{ old('category_ar', $project->category_ar ?? '') }}" placeholder="مثال: تطوير الويب" dir="rtl">
            @error('category_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="technologies_ar" class="form-label fw-semibold">Technologies (Arabic)</label>
            <input id="technologies_ar" name="technologies_ar" type="text" class="form-control @error('technologies_ar') is-invalid @enderror"
                value="{{ old('technologies_ar', is_array($project->technologies_ar) ? implode(', ', $project->technologies_ar) : $project->technologies_ar ?? '') }}"
                placeholder="مثال: Laravel، Vue.js، MySQL" dir="rtl">
            <div class="form-text">قائمة التقنيات المستخدمة مفصولة بفواصل.</div>
            @error('technologies_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description_ar" class="form-label fw-semibold">Description (Arabic)</label>
            <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror"
                rows="4" placeholder="وصف المشروع..." dir="rtl">{{ old('description_ar', $project->description_ar ?? '') }}</textarea>
            @error('description_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
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
