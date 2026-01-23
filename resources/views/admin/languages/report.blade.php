@extends('layouts.admin')

@section('page-title', 'Translation Comparison Report')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .file-section { background: white; border-radius: 8px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin-bottom: 40px; padding: 25px; overflow-x: auto; }
    h2 { color: #1877f2; border-bottom: 2px solid #e4e6eb; padding-bottom: 15px; margin-bottom: 20px; font-family: monospace; }
    table { width: 100%; border-collapse: collapse; min-width: 1200px; }
    th { background: #f5f6f7; color: #65676b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 8px; border: 1px solid #e4e6eb; position: sticky; left: 0; z-index: 10; }
    td { padding: 12px 8px; text-align: center; border: 1px solid #e4e6eb; font-size: 0.85rem; }
    .metric-header { background: #f5f6f7; color: #1c1e21; font-weight: bold; text-align: left; min-width: 120px; }
    .source-col { background: #e7f3ff; font-weight: bold; }
    .percentage-row td { font-weight: bold; }
    .text-perfect { color: #42b72a; }
    .text-good { color: #f7b928; }
    .text-poor { color: #fa3e3e; }
    .lang-header { min-width: 60px; }
    .select2-container .select2-selection--multiple { min-height: 38px; border: 1px solid #ced4da; }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.languages.report') }}" method="GET" class="row align-items-end">
                <div class="col-md-10">
                    <label class="font-weight-bold">Compare Languages</label>
                    <select class="form-control select2" name="languages[]" multiple="multiple" data-placeholder="Select languages to compare (leave empty for all)">
                        @foreach($allLocales as $locale)
                            @if($locale !== 'en')
                                <option value="{{ $locale }}" {{ in_array($locale, $selectedLanguages) ? 'selected' : '' }}>
                                    {{ strtoupper($locale) }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Filter Report</button>
                    @if(!empty($selectedLanguages))
                        <a href="{{ route('admin.languages.report') }}" class="btn btn-link btn-block btn-sm mt-1">Reset Filter</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    @foreach ($englishKeys as $fileName => $refKeys)
        @php
            if (strpos($fileName, 'tools') === false && $fileName !== 'en.json') continue;
            $refCount = count($refKeys);
        @endphp
        
        <div class="card file-section">
            <div class="card-header border-0 pb-0">
                <h3 class="card-title text-primary font-weight-bold" style="font-family: monospace;">
                    {{ $fileName }} <span class="text-muted small">({{ $refCount }} Source Keys)</span>
                </h3>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="metric-header">Locale</th>
                                @foreach ($sortedLocaleCodes as $code)
                                    @php $isSource = ($code === 'en'); @endphp
                                    <th class="{{ $isSource ? 'source-col' : '' }} lang-header text-center">
                                        {{ strtoupper($code) }}
                                        @if($isSource) <span class="badge badge-primary d-block mt-1">REF</span> @endif
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="metric-header">Keys Count</th>
                                @foreach ($sortedLocaleCodes as $code)
                                    @php 
                                        $count = ($code === 'en') ? $refCount : ($allLocalesData[$code]['files'][$fileName] ?? 0);
                                        $isSource = ($code === 'en');
                                    @endphp
                                    <td class="{{ $isSource ? 'source-col' : '' }} text-center">{{ $count }}</td>
                                @endforeach
                            </tr>
                            <tr class="percentage-row">
                                <th class="metric-header">Completion %</th>
                                @foreach ($sortedLocaleCodes as $code)
                                    @php 
                                        $count = ($code === 'en') ? $refCount : ($allLocalesData[$code]['files'][$fileName] ?? 0);
                                        $perc = $refCount > 0 ? round(($count / $refCount) * 100, 1) : 100;
                                        $isSource = ($code === 'en');
                                        $colorClass = $isSource ? 'text-perfect' : ($perc >= 100 ? 'text-perfect' : ($perc > 90 ? 'text-good' : 'text-poor'));
                                    @endphp
                                    <td class="{{ $isSource ? 'source-col' : '' }} {{ $colorClass }} text-center">{{ $perc }}%</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%'
        });
    });
</script>
@endpush
