@extends('layouts.admin')

@section('page-title', 'Translation Keys Checker')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .checker-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            padding: 25px;
        }

        h2 {
            color: #1877f2;
            border-bottom: 2px solid #e4e6eb;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-family: monospace;
        }

        .table-container {
            overflow-x: auto;
            max-height: 600px;
            overflow-y: auto;
            border: 1px solid #e4e6eb;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th {
            background: #f5f6f7;
            color: #65676b;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 8px;
            border: 1px solid #e4e6eb;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        th.key-column {
            position: sticky;
            left: 0;
            z-index: 20;
            background: #f5f6f7;
            min-width: 250px;
        }

        td {
            padding: 8px;
            border: 1px solid #e4e6eb;
            font-size: 0.85rem;
            vertical-align: top;
            max-width: 300px;
            word-wrap: break-word;
        }

        td.key-cell {
            position: sticky;
            left: 0;
            background: #fff;
            z-index: 5;
            font-weight: bold;
            font-family: monospace;
            color: #1c1e21;
            border-right: 2px solid #e4e6eb;
        }

        .missing-translation {
            background-color: #fff0f0;
            color: #fa3e3e;
            font-style: italic;
            font-size: 0.75rem;
        }

        .source-col {
            background: #e7f3ff;
        }

        .search-box {
            margin-bottom: 20px;
        }

        .lang-badge {
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 4px;
            background: #e4e6eb;
            color: #65676b;
            margin-right: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('admin.languages.checker') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label class="font-weight-bold">Select Languages to Compare</label>
                            <select class="form-control select2" name="languages[]" multiple="multiple"
                                data-placeholder="Select languages">
                                @foreach($allLocales as $locale)
                                    <option value="{{ $locale }}" {{ in_array($locale, $selectedLanguages) ? 'selected' : '' }}>
                                        {{ strtoupper($locale) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Compare</button>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="keySearch" class="form-control" placeholder="Search keys...">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($allFilesKeys as $fileName => $keys)
            <div class="checker-section">
                <h3 class="mb-4" style="font-family: monospace;">{{ $fileName }}</h3>

                <div class="table-container">
                    <table class="table table-hover mb-0" id="table-{{ Str::slug($fileName) }}">
                        <thead>
                            <tr>
                                <th class="key-column">Translation Key</th>
                                @foreach ($selectedLanguages as $locale)
                                    <th class="{{ $locale === 'en' ? 'source-col' : '' }} text-center">
                                        {{ strtoupper($locale) }}
                                        @if($locale === 'en') <span class="badge badge-primary d-block mt-1">REF</span> @endif
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keys as $key)
                                <tr class="translation-row">
                                    <td class="key-cell">{{ $key }}</td>
                                    @foreach ($selectedLanguages as $locale)
                                                    @php
                                                        // Handle filename variation for main JSON (en.json vs de.json)
                                                        $targetFile = $fileName;
                                                        if ($fileName === 'en.json' && $locale !== 'en') {
                                                            $targetFile = $locale . '.json';
                                                        }
                                                        $val = $comparisonData[$locale][$targetFile][$key] ?? null;
                                                    @endphp
                                        <td
                                                        class="{{ $locale === 'en' ? 'source-col' : '' }} {{ is_null($val) ? 'missing-translation' : '' }}">
                                                        @if(is_null($val))
                                                            [Missing]
                                                        @else
                                                            {{ $val }}
                                                        @endif
                                                    </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%'
            });

            $('#keySearch').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $(".translation-row").filter(function () {
                    $(this).toggle($(this).find('.key-cell').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush