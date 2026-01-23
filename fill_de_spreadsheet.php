<?php

// Fill empty keys in German spreadsheet.json with authentic German translations

$file = 'resources/lang/de/tools/spreadsheet.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define authentic German translations for FAQ sections
$fills = [
    // CSV to Excel FAQ
    'csv-to-excel.faq.title' => 'Häufig gestellte Fragen',
    'csv-to-excel.faq.q1' => 'Kann ich große CSV-Dateien in Excel konvertieren?',
    'csv-to-excel.faq.a1' => 'Ja! Unser Tool verarbeitet CSV-Dateien verschiedener Größen. Bei sehr großen Dateien (100MB+) kann die Konvertierung etwas länger dauern, aber der Prozess ist für Leistung optimiert.',
    'csv-to-excel.faq.q2' => 'Wird die Formatierung bei der Konvertierung beibehalten?',
    'csv-to-excel.faq.a2' => 'CSV-Dateien enthalten nur Rohdaten ohne Formatierung. Die Excel-Datei enthält die Daten ordnungsgemäß in Zellen organisiert, aber Sie müssen die Formatierung (Farben, Schriftarten, Rahmen) nach der Konvertierung manuell in Excel anwenden.',

    // CSV to SQL FAQ
    'csv-to-sql.faq.title' => 'Häufig gestellte Fragen',
    'csv-to-sql.faq.q1' => 'Welche SQL-Datenbanken werden unterstützt?',
    'csv-to-sql.faq.a1' => 'Unser Tool generiert Standard-SQL-INSERT-Anweisungen, die mit MySQL, PostgreSQL, SQL Server, SQLite und anderen wichtigen Datenbanksystemen kompatibel sind. Sie können den Tabellennamen und die Spaltennamen nach Bedarf anpassen.',
    'csv-to-sql.faq.q2' => 'Wie gehe ich mit Sonderzeichen in meinen CSV-Daten um?',
    'csv-to-sql.faq.a2' => 'Der Konverter maskiert automatisch Sonderzeichen (Anführungszeichen, Backslashes), um SQL-Injection und Syntaxfehler zu verhindern. Ihre Daten werden sicher in ordnungsgemäß formatierte SQL-Anweisungen konvertiert.',

    // CSV to XML
    'csv-to-xml-converter.content.how_steps.3.title' => 'XML-Datei herunterladen',
    'csv-to-xml-converter.content.how_steps.3.desc' => 'Klicken Sie auf die Download-Schaltfläche, um Ihre konvertierte XML-Datei zu speichern, die sofort in Anwendungen, APIs oder Datenaustauschsystemen verwendet werden kann.',
    'csv-to-xml-converter.content.tips_list.5' => 'Validieren Sie Ihre XML-Ausgabe mit einem XML-Validator, um die ordnungsgemäße Struktur und Kompatibilität mit Ihrem Zielsystem sicherzustellen.',

    // Excel to CSV FAQ
    'excel-to-csv.faq.title' => 'Häufig gestellte Fragen',
    'excel-to-csv.faq.q1' => 'Werden Formeln in CSV konvertiert?',
    'excel-to-csv.faq.a1' => 'Das CSV-Format unterstützt nur Klartextwerte. Bei der Konvertierung von Excel in CSV werden Formeln durch ihre berechneten Werte ersetzt. Wenn Sie Formeln beibehalten müssen, bewahren Sie eine Kopie der ursprünglichen Excel-Datei auf.',
    'excel-to-csv.faq.q2' => 'Kann ich mehrere Excel-Tabellen gleichzeitig konvertieren?',
    'excel-to-csv.faq.a2' => 'Jedes Excel-Arbeitsblatt muss separat in CSV konvertiert werden. Wenn Ihre Excel-Datei mehrere Blätter hat, erhalten Sie für jedes Blatt eine separate CSV-Datei, oder Sie können wählen, welches Blatt konvertiert werden soll.',

    // Google Sheets to Excel FAQ
    'google-sheets-to-excel.faq.title' => 'Häufig gestellte Fragen',
    'google-sheets-to-excel.faq.q1' => 'Muss ich zuerst von Google Sheets herunterladen?',
    'google-sheets-to-excel.faq.a1' => 'Ja, Sie müssen Ihr Google Sheet zuerst als Excel-Datei (.xlsx) oder CSV herunterladen. Gehen Sie in Google Sheets zu Datei > Herunterladen > Microsoft Excel (.xlsx), um die Datei für die Konvertierung zu erhalten.',
    'google-sheets-to-excel.faq.q2' => 'Funktionieren Google Sheets-Formeln in Excel?',
    'google-sheets-to-excel.faq.a2' => 'Die meisten gängigen Formeln (SUMME, MITTELWERT, WENN, SVERWEIS) sind zwischen Google Sheets und Excel kompatibel. Einige Google-spezifische Funktionen funktionieren jedoch möglicherweise nicht in Excel und müssen angepasst werden.',

    // XLS to XLSX FAQ
    'xls-to-xlsx.faq.title' => 'Häufig gestellte Fragen',
    'xls-to-xlsx.faq.q1' => 'Was ist der Unterschied zwischen XLS und XLSX?',
    'xls-to-xlsx.faq.a1' => 'XLS ist das ältere Excel-Format (Excel 97-2003) mit einer Begrenzung von 65.536 Zeilen. XLSX ist das moderne XML-basierte Format (Excel 2007+) mit 1.048.576 Zeilen, besserer Komprimierung und verbesserter Sicherheit. Die Konvertierung zu XLSX wird für bessere Kompatibilität empfohlen.',
    'xls-to-xlsx.faq.q2' => 'Werden Makros bei der Konvertierung von XLS zu XLSX beibehalten?',
    'xls-to-xlsx.faq.a2' => 'Ja, Makros und VBA-Code werden während der Konvertierung beibehalten. Wenn Ihre Datei jedoch Makros enthält, speichern Sie sie als .XLSM (makrofähig) anstelle von .XLSX, um sicherzustellen, dass Makros funktionsfähig bleiben.',

    // XLSX to XLS FAQ
    'xlsx-to-xls.faq.title' => 'Häufig gestellte Fragen',
    'xlsx-to-xls.faq.q1' => 'Warum sollte ich XLSX zurück in XLS konvertieren?',
    'xlsx-to-xls.faq.a1' => 'Die Konvertierung in das XLS-Format ist nützlich für die Kompatibilität mit älteren Excel-Versionen (Excel 97-2003) oder Legacy-Systemen, die das neuere XLSX-Format nicht unterstützen. XLS hat jedoch Einschränkungen wie weniger Zeilen und größere Dateigrößen.',
    'xlsx-to-xls.faq.q2' => 'Verliere ich Daten bei der Konvertierung von XLSX zu XLS?',
    'xlsx-to-xls.faq.a2' => 'Wenn Ihre XLSX-Datei mehr als 65.536 Zeilen oder 256 Spalten hat, werden die Daten beim Konvertieren in das XLS-Format abgeschnitten. Außerdem werden einige neuere Excel-Funktionen möglicherweise nicht im älteren XLS-Format unterstützt.'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ DE spreadsheet.json: 33 leere Schlüssel gefüllt\n";
echo "  - CSV zu Excel FAQ (5 Schlüssel)\n";
echo "  - CSV zu SQL FAQ (5 Schlüssel)\n";
echo "  - CSV zu XML Schritte (3 Schlüssel)\n";
echo "  - Excel zu CSV FAQ (5 Schlüssel)\n";
echo "  - Google Sheets zu Excel FAQ (5 Schlüssel)\n";
echo "  - XLS zu XLSX FAQ (5 Schlüssel)\n";
echo "  - XLSX zu XLS FAQ (5 Schlüssel)\n";
