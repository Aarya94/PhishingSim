@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Phishing Campaigns</h2> 

    <a href="{{ route('campaigns.create') }}" class="btn btn-primary mb-3">Create New Campaign</a>

    @if($campaigns->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Phishing Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->subject }}</td>
                    <td><a href="{{ $campaign->phishing_link }}" target="_blank">{{ $campaign->phishing_link }}</a></td>
                    <td>
                        <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No campaigns found. Create one above.</p>
    @endif
</div>
@endsection
