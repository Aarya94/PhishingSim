@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Campaign Details</h2>
    <div class="card p-3">
        <p><strong>Subject:</strong> {{ $campaign->subject }}</p>
        <p><strong>Email Body:</strong> {{ $campaign->email_body }}</p>
        <p><strong>Phishing Link:</strong> 
            <a href="{{ $campaign->phishing_link }}" target="_blank">
                {{ $campaign->phishing_link }}
            </a>
        </p>
    </div>
    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
