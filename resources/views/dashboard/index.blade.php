@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📢 Campaigns</h2>
        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">+ Create New Campaign</a>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            Campaign List
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Target List</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($campaigns as $campaign)
                        <tr>
                            <td>{{ $campaign->id }}</td>
                            <td>{{ $campaign->subject }}</td>
                            <td>
                                @if($campaign->target_list)
                                    <span class="badge bg-info">
                                        {{ count(explode(',', $campaign->target_list)) }} recipients
                                    </span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                @if($campaign->status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $campaign->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>

                                <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this campaign?')">
                                        Delete
                                    </button>
                                </form>

                                <a href="{{ route('campaigns.sendTest', $campaign->id) }}" class="btn btn-sm btn-outline-primary">Send Test</a>
                                <a href="{{ route('campaigns.send', $campaign->id) }}" class="btn btn-sm btn-success">Send Campaign</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No campaigns created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
