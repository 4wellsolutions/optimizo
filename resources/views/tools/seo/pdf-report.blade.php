<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ __tool('pdf-report', 'seo.title') }} - {{ $meta['url'] }}</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #1e293b;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }

        /* Cover Page */
        .cover-page {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #312e81;
            /* Solid Indigo 900 for DomPDF */
            color: white;
            text-align: center;
            padding-top: 100px;
        }

        .cover-brand {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 60px;
            opacity: 0.9;
        }

        .cover-title {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .cover-url {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 60px;
            color: #c7d2fe;
            background: rgba(255, 255, 255, 0.1);
            display: inline-block;
            padding: 10px 30px;
            border-radius: 50px;
        }

        .score-container {
            margin: 0 auto 60px auto;
            width: 180px;
            height: 180px;
            line-height: 180px;
            border-radius: 50%;
            background: white;
            color: #4338ca;
            font-size: 72px;
            font-weight: 900;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .cover-footer {
            position: absolute;
            bottom: 50px;
            width: 100%;
            font-size: 14px;
            opacity: 0.7;
            letter-spacing: 1px;
        }

        /* Content Pages */
        .page-break {
            page-break-after: always;
        }

        .header {
            background: white;
            border-bottom: 3px solid #4338ca;
            padding: 20px 40px;
        }

        .header-brand {
            font-weight: bold;
            color: #4338ca;
            font-size: 18px;
            float: left;
        }

        .header-date {
            float: right;
            color: #64748b;
            font-size: 14px;
        }

        .clearfix {
            clear: both;
        }

        .content {
            padding: 40px;
        }

        .section-header {
            font-size: 24px;
            font-weight: 800;
            color: #1e293b;
            margin-top: 20px;
            margin-bottom: 30px;
            border-left: 5px solid #4f46e5;
            padding-left: 15px;
            text-transform: uppercase;
        }

        /* Modules Grid */
        .module {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 25px;
            page-break-inside: avoid;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .module-header {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f5f9;
            background: #f8fafc;
        }

        .module-title {
            font-weight: 700;
            font-size: 16px;
            color: #334155;
            float: left;
        }

        .module-badge {
            float: right;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 4px;
        }

        .badge-pass {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-warning {
            background: #fef9c3;
            color: #a16207;
        }

        .badge-fail {
            background: #fee2e2;
            color: #b91c1c;
        }

        .module-body {
            padding: 20px;
        }

        .explanation {
            margin-top: 0;
            font-size: 14px;
            color: #475569;
            margin-bottom: 15px;
        }

        /* Details Grid using Tables */
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details-table td {
            padding: 8px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
            width: 33.33%;
            background: #f1f5f9;
        }

        .label-text {
            font-size: 10px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .value-text {
            font-size: 13px;
            font-weight: 600;
            color: #0f172a;
            word-wrap: break-word;
        }

        .recommendation-box {
            background: #fffbdd;
            /* Light Yellow */
            border-left: 4px solid #f59e0b;
            padding: 10px 15px;
            font-size: 13px;
            color: #78350f;
            margin-top: 15px;
            border-radius: 0 4px 4px 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
            padding: 20px;
            background: white;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>

<body>
    @php
        $totalScore = collect($results)->sum('score');
        $count = count($results) ?: 1;
        $avgScore = round($totalScore / $count);
    @endphp

    <!-- PAGE 1: COVER -->
    <div class="cover-page">
        <div class="cover-brand">{{ __tool('pdf-report', 'interface.brand_name') }}</div>
        <br><br>
        <div class="cover-title">{{ __tool('pdf-report', 'interface.cover_title') }}</div>
        <div class="cover-url">{{ $meta['url'] }}</div>

        <div class="score-container">
            {{ $avgScore }}
        </div>

        <div style="font-size: 18px; font-weight: 300; opacity: 0.9;">
            {{ __tool('pdf-report', 'interface.overall_score') }}
        </div>

        <div class="cover-footer">
            {{ __tool('pdf-report', 'interface.generated_on') }} {{ $meta['date'] }}<br>
            {{ __tool('pdf-report', 'interface.suite_name') }}
        </div>
    </div>

    <div class="page-break"></div>

    <!-- PAGE 2+: CONTENT -->
    <div class="header">
        <div class="header-brand">{{ __tool('pdf-report', 'interface.audit_title') }}</div>
        <div class="header-date">{{ $meta['date'] }}</div>
        <div class="clearfix"></div>
    </div>

    <div class="content">
        <div class="section-header">{{ __tool('pdf-report', 'interface.analysis_methods') }}</div>

        @foreach($results as $step => $data)
            <div class="module">
                <div class="module-header">
                    <div class="module-title">{{ $data['title'] }}</div>
                    <div
                        class="module-badge badge-{{ $data['status'] === 'pass' ? 'pass' : ($data['status'] === 'warning' ? 'warning' : 'fail') }}">
                        {{ strtoupper($data['status']) }} - {{ $data['score'] }}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="module-body">
                    <p class="explanation">{{ $data['explanation'] }}</p>

                    @if(isset($data['details']) && is_array($data['details']))
                        <table class="details-table">
                            @foreach(array_chunk($data['details'], 3, true) as $chunk)
                                <tr>
                                    @foreach($chunk as $key => $value)
                                        <td>
                                            <div class="label-text">{{ str_replace('_', ' ', $key) }}</div>
                                            <div class="value-text">{{ is_array($value) ? implode(', ', $value) : $value }}</div>
                                        </td>
                                    @endforeach
                                    <!-- Fill empty cells if chunk < 3 -->
                                    @for($i = count($chunk); $i < 3; $i++)
                                        <td style="background: transparent; border: none;"></td>
                                    @endfor
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    @if(!empty($data['fix']))
                        <div class="recommendation-box">
                            <strong>{{ __tool('pdf-report', 'interface.recommendation') }}</strong> {{ $data['fix'] }}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Helvetica", "normal");
                $size = 9;
                $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                $y = 820;
                $x = 520;
                $pdf->text($x, $y, $pageText, $font, $size, array(0.6,0.6,0.6));
            ');
        }
    </script>
</body>

</html>