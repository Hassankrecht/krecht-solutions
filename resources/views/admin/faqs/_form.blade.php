@csrf

<div class="mb-3">
    <label for="question" class="form-label fw-semibold">Question <span class="text-danger">*</span></label>
    <input id="question" name="question" type="text" class="form-control @error('question') is-invalid @enderror"
        value="{{ old('question', $faq->question ?? '') }}" required
        placeholder="e.g. What services do you offer?">
    @error('question')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="answer" class="form-label fw-semibold">Answer <span class="text-danger">*</span></label>
    <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror"
        rows="6" required placeholder="Provide a clear and helpful answer...">{{ old('answer', $faq->answer ?? '') }}</textarea>
    @error('answer')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
