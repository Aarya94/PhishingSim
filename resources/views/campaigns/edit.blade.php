@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Campaign</h2>

    <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Subject:</label>
            <input type="text" class="form-control" name="subject" value="{{ old('subject', $campaign->subject) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Email Body:</label>
            <textarea class="form-control" name="email_body" rows="5" required>{{ old('email_body', $campaign->email_body) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Target Emails (comma-separated):</label>
            <textarea class="form-control" name="target_list" rows="3">{{ old('target_list', $campaign->target_list) }}</textarea>
            <small class="form-text text-muted">
                Enter multiple emails separated by commas (e.g. user1@example.com, user2@example.com)
            </small>
        </div>

        <button type="submit" class="btn btn-success">Update Campaign</button>
        <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
