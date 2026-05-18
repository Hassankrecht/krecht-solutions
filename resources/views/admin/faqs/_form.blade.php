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
            <label for="question_en" class="form-label fw-semibold">Question (English) <span class="text-danger">*</span></label>
            <input id="question_en" name="question_en" type="text" class="form-control @error('question_en') is-invalid @enderror"
                value="{{ old('question_en', $faq->question_en ?? '') }}" required
                placeholder="e.g. What services do you offer?">
            @error('question_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer_en" class="form-label fw-semibold">Answer (English) <span class="text-danger">*</span></label>
            <textarea id="answer_en" name="answer_en" class="form-control @error('answer_en') is-invalid @enderror"
                rows="6" required placeholder="Provide a clear and helpful answer...">{{ old('answer_en', $faq->answer_en ?? '') }}</textarea>
            @error('answer_en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="tab-pane fade" id="ar" role="tabpanel">
        <div class="mb-3">
            <label for="question_ar" class="form-label fw-semibold">Question (Arabic)</label>
            <input id="question_ar" name="question_ar" type="text" class="form-control @error('question_ar') is-invalid @enderror"
                value="{{ old('question_ar', $faq->question_ar ?? '') }}" placeholder="مثال: ما الخدمات التي تقدمونها؟" dir="rtl">
            @error('question_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer_ar" class="form-label fw-semibold">Answer (Arabic)</label>
            <textarea id="answer_ar" name="answer_ar" class="form-control @error('answer_ar') is-invalid @enderror"
                rows="6" placeholder="قدم إجابة واضحة ومفيدة..." dir="rtl">{{ old('answer_ar', $faq->answer_ar ?? '') }}</textarea>
            @error('answer_ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="order" class="form-label fw-semibold">Sort Order</label>
            <input id="order" name="order" type="number" min="0" class="form-control @error('order') is-invalid @enderror"
                value="{{ old('order', $faq->order ?? 0) }}">
            @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-8 d-flex align-items-center">
        <div class="form-check form-switch mt-2">
            <input id="is_active" name="is_active" class="form-check-input" type="checkbox" value="1"
                @checked(old('is_active', $faq->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active (visible on the website)</label>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-2">
    <button type="submit" class="btn btn-primary">Save FAQ</button>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
