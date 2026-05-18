@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Client Name <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $testimonial->name ?? '') }}" required placeholder="e.g. John Smith">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                @foreach(\App\Models\Testimonial::statuses() as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $testimonial->status ?? \App\Models\Testimonial::STATUS_APPROVED) === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="rating" class="form-label fw-semibold">Rating <span class="text-danger">*</span></label>
            <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @selected(old('rating', $testimonial->rating ?? 5) == $i)>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

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
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="position_en" class="form-label fw-semibold">Position / Role (English)</label>
                    <input id="position_en" name="position_en" type="text" class="form-control @error('position_en') is-invalid @enderror"
                        value="{{ old('position_en', $testimonial->position_en ?? '') }}" placeholder="e.g. CEO, Marketing Manager">
                    @error('position_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="company_en" class="form-label fw-semibold">Company (English)</label>
                    <input id="company_en" name="company_en" type="text" class="form-control @error('company_en') is-invalid @enderror"
                        value="{{ old('company_en', $testimonial->company_en ?? '') }}" placeholder="e.g. Acme Corp">
                    @error('company_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="content_en" class="form-label fw-semibold">Testimonial Content (English) <span class="text-danger">*</span></label>
            <textarea id="content_en" name="content_en" class="form-control @error('content_en') is-invalid @enderror"
                rows="5" required placeholder="What the client said...">{{ old('content_en', $testimonial->content_en ?? '') }}</textarea>
            @error('content_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="ar" role="tabpanel">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="position_ar" class="form-label fw-semibold">Position / Role (Arabic)</label>
                    <input id="position_ar" name="position_ar" type="text" class="form-control @error('position_ar') is-invalid @enderror"
                        value="{{ old('position_ar', $testimonial->position_ar ?? '') }}" placeholder="مثال: المدير التنفيذي، مدير التسويق" dir="rtl">
                    @error('position_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="company_ar" class="form-label fw-semibold">Company (Arabic)</label>
                    <input id="company_ar" name="company_ar" type="text" class="form-control @error('company_ar') is-invalid @enderror"
                        value="{{ old('company_ar', $testimonial->company_ar ?? '') }}" placeholder="مثال: شركة أكيم" dir="rtl">
                    @error('company_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="content_ar" class="form-label fw-semibold">Testimonial Content (Arabic)</label>
            <textarea id="content_ar" name="content_ar" class="form-control @error('content_ar') is-invalid @enderror"
                rows="5" placeholder="ما قاله العميل..." dir="rtl">{{ old('content_ar', $testimonial->content_ar ?? '') }}</textarea>
            @error('content_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Client Email</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $testimonial->email ?? '') }}" placeholder="client@example.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="image" class="form-label fw-semibold">Image URL</label>
            <input id="image" name="image" type="text" class="form-control @error('image') is-invalid @enderror"
                value="{{ old('image', $testimonial->image ?? '') }}"
                placeholder="e.g. assets/images/testimonials/client1.jpg">
            @if(!empty($testimonial->image))
                <div class="form-text">
                    Current image:
                    <a href="{{ asset($testimonial->image) }}" target="_blank" rel="noopener">View image</a>
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
            <input id="sort_order" name="sort_order" type="number" min="0" class="form-control @error('sort_order') is-invalid @enderror"
                value="{{ old('sort_order', $testimonial->sort_order ?? $testimonial->order ?? 0) }}">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-check form-switch mb-4">
    <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
        @checked(old('is_active', $testimonial->is_active ?? true))>
    <label class="form-check-label" for="is_active">Active (visible on the website)</label>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save Testimonial</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
