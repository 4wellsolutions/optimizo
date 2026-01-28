import os
import json

def update_translation(locale, data):
    base_path = r'd:\workspace\optimizo\resources\lang'
    file_path = os.path.join(base_path, locale, 'tools', 'text.json')
    
    if not os.path.exists(file_path):
        print(f"File not found: {file_path}")
        return

    with open(file_path, 'r', encoding='utf-8') as f:
        file_data = json.load(f)
    
    if 'file-difference-checker' in file_data:
        file_data['file-difference-checker']['content'].update(data)
        
        with open(file_path, 'w', encoding='utf-8') as f:
            json.dump(file_data, f, indent=4, ensure_ascii=False)
        print(f"Updated {locale}")
    else:
        print(f"Tool not found in {locale}")

# Batch 2: id, it, ja, ko, nl, no
translations = {
    'id': {
        "features": {
            "visual": {"title": "Perbandingan Visual", "desc": "Lihat perbedaan dengan jelas dengan sorotan berkode warna untuk baris yang ditambah dan dihapus."},
            "instant": {"title": "Hasil Instan", "desc": "Dapatkan hasil diff instan segera setelah Anda mengklik bandingkan, tanpa menunggu."},
            "privacy": {"title": "Privasi Terlindungi", "desc": "Semua pemrosesan terjadi di browser Anda. File dan teks Anda tidak pernah dikirim ke server kami."},
            "unlimited": {"title": "Tanpa Batas", "desc": "Bandingkan teks dengan panjang berapa pun tanpa pemuatan ulang halaman atau batasan karakter."},
            "accurate": {"title": "Akurasi Baris-per-Baris", "desc": "Menggunakan algoritme canggih untuk mendeteksi perubahan sekecil apa pun antara dua versi."},
            "free": {"title": "100% Gratis", "desc": "Alat perbandingan file berkualitas tinggi tersedia gratis, tanpa perlu pendaftaran."}
        },
        "uses": {
            "code": {"title": "Peninjauan Kode", "desc": "Bandingkan cuplikan kode untuk menemukan bug, meninjau perubahan, atau memahami perbedaan implementasi."},
            "document": {"title": "Revisi Dokumen", "desc": "Lacak perubahan antara dua versi dokumen, kontrak, atau artikel dengan mudah."},
            "config": {"title": "File Konfigurasi", "desc": "Temukan perbedaan dalam file JSON, YAML, atau .env yang mungkin menyebabkan kesalahan sistem."},
            "merge": {"title": "Penggabungan Manual", "desc": "Tinjau dan gabungkan perubahan dari dua sumber yang berbeda tanpa alat Git yang rumit."},
            "backup": {"title": "Verifikasi Cadangan", "desc": "Pastikan cadangan Anda identik atau identifikasi apa yang telah berubah sejak penyimpanan terakhir."},
            "translation": {"title": "Pemeriksaan Terjemahan", "desc": "Bandingkan blok teks asli dan terjemahan untuk memastikan konsistensi struktur dan panjang."}
        },
        "how_steps": {
            "1": {"title": "Tempel Teks Asli", "desc": "Masukkan teks dasar atau kode Anda ke kolom 'Teks Asli' di sebelah kiri."},
            "2": {"title": "Tempel Teks Hasil Modifikasi", "desc": "Masukkan versi yang ingin Anda bandingkan ke kolom 'Teks Hasil Modifikasi' di sebelah kanan."},
            "3": {"title": "Klik Bandingkan", "desc": "Tekan tombol 'Bandingkan File' untuk memulai proses analisis."},
            "4": {"title": "Tinjau Perbedaan", "desc": "Lihat hasil di bawah ini. Baris hijau adalah tambahan, baris merah adalah yang dihapus."}
        },
        "faq": {
            "q1": "Apakah data teks saya aman?",
            "a1": "Tentu saja. Alat ini berjalan sepenuhnya di sisi klien menggunakan JavaScript. Tidak ada data yang dikirim ke server kami.",
            "q2": "Format apa yang didukung?",
            "a2": "Anda dapat membandingkan konten teks biasa apa pun, termasuk kode sumber (PHP, JS, Python) dan dokumen teks standar.",
            "q3": "Bisakah membandingkan file Word atau PDF?",
            "a3": "Saat ini, Anda perlu menyalin teks dari file tersebut dan menempelkannya di sini. Kami sedang berupaya mendukung unggah file langsung.",
            "q4": "Apakah ia mendeteksi baris yang dipindahkan?",
            "a4": "Versi saat ini fokus pada penambahan dan penghapusan. Baris yang dipindahkan akan muncul sebagai penghapusan di satu tempat dan penambahan di tempat lain.",
            "q5": "Apakah ada batasan ukuran?",
            "a5": "Satu-satunya batasan adalah memori browser Anda. Sebagian besar dokumen standar akan dibandingkan hampir secara instan."
        }
    },
    'it': {
        "features": {
            "visual": {"title": "Confronto Visivo", "desc": "Visualizza chiaramente le differenze con l'evidenziazione a colori per le righe aggiunte e rimosse."},
            "instant": {"title": "Risultati Istantanei", "desc": "Ottieni risultati immediati non appena clicchi su confronta, senza attese."},
            "privacy": {"title": "Privacy Protetta", "desc": "Tutta l'elaborazione avviene nel tuo browser. I tuoi file non vengono mai inviati ai nostri server."},
            "unlimited": {"title": "Senza Limiti", "desc": "Confronta testi di qualsiasi lunghezza senza ricaricamenti di pagina o restrizioni di caratteri."},
            "accurate": {"title": "Accuratezza Riga per Riga", "desc": "Utilizza algoritmi avanzati per rilevare anche i più piccoli cambiamenti tra due versioni."},
            "free": {"title": "100% Gratuito", "desc": "Strumento di confronto file di alta qualità disponibile senza costi, senza registrazione richiesta."}
        },
        "uses": {
            "code": {"title": "Revisione del Codice", "desc": "Confronta snippet di codice per trovare bug, revisionare modifiche o capire differenze di implementazione."},
            "document": {"title": "Revisioni di Documenti", "desc": "Traccia facilmente le modifiche tra due versioni di un documento, contratto o articolo."},
            "config": {"title": "File di Configurazione", "desc": "Individua differenze nei file JSON, YAML o .env che potrebbero causare errori di sistema."},
            "merge": {"title": "Unione Manuale", "desc": "Esamina e unisci le modifiche da due fonti diverse senza complicati strumenti Git."},
            "backup": {"title": "Verifica del Backup", "desc": "Assicurati che i tuoi backup siano identici o identifica cosa è cambiato dall'ultimo salvataggio."},
            "translation": {"title": "Controllo Traduzione", "desc": "Confronta blocchi di testo originali e tradotti per garantire la coerenza della struttura e della lunghezza."}
        },
        "how_steps": {
            "1": {"title": "Incolla Testo Originale", "desc": "Inserisci il tuo testo di base o il codice nel campo 'Testo Originale' a sinistra."},
            "2": {"title": "Incolla Testo Modificato", "desc": "Inserisci la versione che vuoi confrontare nel campo 'Testo Modificato' a destra."},
            "3": {"title": "Clicca su Confronta", "desc": "Premi il pulsante 'Confronta File' per avviare il processo di analisi."},
            "4": {"title": "Esamina Differenze", "desc": "Vedi i risultati qui sotto. Le righe verdi sono aggiunte, quelle rosse sono rimosse."}
        },
        "faq": {
            "q1": "I miei dati testuali sono al sicuro?",
            "a1": "Assolutamente. Questo strumento gira interamente lato client tramite JavaScript. Nessun dato viene trasmesso ai nostri server.",
            "q2": "Quali formati sono supportati?",
            "a2": "Puoi confrontare qualsiasi contenuto di testo normale, inclusi codici sorgente (PHP, JS, Python) e documenti di testo standard.",
            "q3": "Può confrontare file Word o PDF?",
            "a3": "Attualmente, è necessario copiare il testo da quei file e incollarlo qui. Stiamo lavorando al supporto per il caricamento diretto dei file.",
            "q4": "Rileva le righe spostate?",
            "a4": "La versione attuale si concentra su aggiunte e rimozioni. Le righe spostate appariranno come una rimozione in un punto e un'aggiunta in un altro.",
            "q5": "C'è un limite di dimensioni?",
            "a5": "L'unico limite è la memoria del tuo browser. La maggior parte dei documenti standard viene confrontata quasi istantaneamente."
        }
    },
    'ja': {
        "features": {
            "visual": {"title": "視覚的比較", "desc": "追加された行と削除された行を色分けして強調表示し、違いを明確に確認できます。"},
            "instant": {"title": "即時の結果", "desc": "比較をクリックするとすぐに結果が表示され、待つ必要はありません。"},
            "privacy": {"title": "プライバシー保護", "desc": "すべての処理はブラウザ内で行われます。ファイルやテキストがサーバーに送信されることはありません。"},
            "unlimited": {"title": "無制限", "desc": "ページの再読み込みや文字数制限なしで、あらゆる長さのテキストを比較できます。"},
            "accurate": {"title": "行ごとの正確さ", "desc": "高度なアルゴリズムを使用して、2つのバージョン間のわずかな違いも検出します。"},
            "free": {"title": "100% 無料", "desc": "高品質なファイル比較ツールを、登録不要で無料で利用できます。"}
        },
        "uses": {
            "code": {"title": "コードレビュー", "desc": "コードスニペットを比較して、バグを見つけたり、変更を確認したり、実装の違いを理解したりできます。"},
            "document": {"title": "ドキュメントの改訂", "desc": "ドキュメント、契約書、記事の2つのバージョン間の変更を簡単に追跡できます。"},
            "config": {"title": "設定ファイル", "desc": "システムエラーの原因となる可能性のあるJSON、YAML、.envファイルの違いを見つけます。"},
            "merge": {"title": "手動マージ", "desc": "複雑なGitツールを使用せずに、2つの異なるソースからの変更を確認してマージします。"},
            "backup": {"title": "バックアップの検証", "desc": "バックアップが同一であることを確認したり、最後の保存以降に変更された箇所を特定したりします。"},
            "translation": {"title": "翻訳チェック", "desc": "原文と翻訳テキストを比較して、構造と長さの一貫性を確認します。"}
        },
        "how_steps": {
            "1": {"title": "元のテキストを貼り付け", "desc": "左側の「元のテキスト」フィールドにベースとなるテキストまたはコードを入力します。"},
            "2": {"title": "変更後のテキストを貼り付け", "desc": "比較したいバージョンを右側の「変更後のテキスト」フィールドに入力します。"},
            "3": {"title": "比較をクリック", "desc": "「ファイルを比較」ボタンを押して分析プロセスを開始します。"},
            "4": {"title": "違いを確認", "desc": "結果が下に表示されます。緑色の行は追加、赤色の行は削除された箇所です。"}
        },
        "faq": {
            "q1": "テキストデータは安全ですか？",
            "a1": "もちろんです。このツールはJavaScriptを使用して完全にクライアント側で動作します。データがサーバーに送信されたり保存されたりすることはありません。",
            "q2": "どのような形式をサポートしていますか？",
            "a2": "ソースコード（PHP、JS、Python）や標準的なテキストドキュメントなど、あらゆるプレーンテキストコンテンツを比較できます。",
            "q3": "WordやPDFファイルを比較できますか？",
            "a3": "現在は、それらのファイルからテキストをコピーしてここに貼り付ける必要があります。直接のファイルアップロード対応に取り組んでいます。",
            "q4": "移動した行を検出しますか？",
            "a4": "現在のバージョンは追加と削除に焦点を当てています。移動した行は、一方での削除と他方での追加として表示されます。",
            "q5": "サイズ制限はありますか？",
            "a5": "制限はブラウザのメモリのみです。ほとんどの標準的なドキュメントやコードファイルはほぼ瞬時に比較できます。"
        }
    },
    'ko': {
        "features": {
            "visual": {"title": "시각적 비교", "desc": "추가된 행과 삭제된 행을 색상별로 강조하여 차이점을 명확하게 확인할 수 있습니다."},
            "instant": {"title": "즉각적인 결과", "desc": "비교를 클릭하는 즉시 결과를 얻을 수 있으며, 기다릴 필요가 없습니다."},
            "privacy": {"title": "프라이버시 보호", "desc": "모든 처리는 브라우저 내에서 이루어집니다. 파일과 텍스트가 서버로 전송되지 않습니다."},
            "unlimited": {"title": "제한 없음", "desc": "페이지 새로고침이나 글자 수 제한 없이 어떤 길이의 텍스트도 비교할 수 있습니다."},
            "accurate": {"title": "행별 정확성", "desc": "고급 알고리즘을 사용하여 두 버전 간의 아주 작은 변화도 감지합니다."},
            "free": {"title": "100% 무료", "desc": "등록 없이 무료로 제공되는 고품질 파일 비교 도구입니다."}
        },
        "uses": {
            "code": {"title": "코드 리뷰", "desc": "코드 스니펫을 비교하여 버그를 찾거나 변경 사항을 검토하며 구현 차이를 이해할 수 있습니다."},
            "document": {"title": "문서 개정", "desc": "문서, 계약서 또는 기사의 두 버전 간의 변경 사항을 쉽게 추적할 수 있습니다."},
            "config": {"title": "설정 파일", "desc": "시스템 오류를 일으킬 수 있는 JSON, YAML, .env 파일의 차이점을 찾습니다."},
            "merge": {"title": "수동 병합", "desc": "복잡한 Git 도구 없이 두 개의 서로 다른 소스에서 변경 사항을 검토하고 병합합니다."},
            "backup": {"title": "백업 확인", "desc": "백업이 동일한지 확인하거나 마지막 저장 이후 변경된 내용을 식별합니다."},
            "translation": {"title": "번역 확인", "desc": "원본과 번역된 텍스트 블록을 비교하여 구조와 길이의 일관성을 확인합니다."}
        },
        "how_steps": {
            "1": {"title": "원본 텍스트 붙여넣기", "desc": "왼쪽의 '원본 텍스트' 필드에 기준이 되는 텍스트나 코드를 입력합니다."},
            "2": {"title": "수정된 텍스트 붙여넣기", "desc": "비교하려는 버전을 오른쪽의 '수정된 텍스트' 필드에 입력합니다."},
            "3": {"title": "비교 클릭", "desc": "'파일 비교' 버튼을 눌러 분석 프로세스를 시작합니다."},
            "4": {"title": "차이점 검토", "desc": "결과가 아래에 표시됩니다. 녹색 행은 추가, 빨간색 행은 삭제된 부분입니다."}
        },
        "faq": {
            "q1": "내 텍스트 데이터는 안전한가요?",
            "a1": "물론입니다. 이 도구는 JavaScript를 사용하여 완전히 클라이언트 측에서 실행됩니다. 데이터가 서버로 전송되거나 저장되지 않습니다.",
            "q2": "어떤 형식을 지원하나요?",
            "a2": "소스 코드(PHP, JS, Python) 및 표준 텍스트 문서를 포함한 모든 일반 텍스트 콘텐츠를 비교할 수 있습니다.",
            "q3": "Word나 PDF 파일을 비교할 수 있나요?",
            "a3": "현재는 해당 파일에서 텍스트를 복사하여 여기에 붙여넣어야 합니다. 직접 파일 업로드 기능을 준비 중입니다.",
            "q4": "이동된 행을 감지하나요?",
            "a4": "현재 버전은 추가 및 삭제에 집중하고 있습니다. 이동된 행은 한 곳에서의 삭제와 다른 곳에서의 추가로 표시됩니다.",
            "q5": "크기 제한이 있나요?",
            "a5": "제한은 브라우저의 메모리뿐입니다. 대부분의 표준 문서와 코드 파일은 거의 즉시 비교됩니다."
        }
    },
    'nl': {
        "features": {
            "visual": {"title": "Visuele Vergelijking", "desc": "Bekijk verschillen duidelijk met kleurgecodeerde markering voor toegevoegde en verwijderde regels."},
            "instant": {"title": "Direct Resultaat", "desc": "Krijg direct resultaat zodra u op vergelijken klikt, zonder wachttijd."},
            "privacy": {"title": "Privacy Beschermd", "desc": "Alle verwerking vindt plaats in uw browser. Uw bestanden worden nooit naar onze servers verzonden."},
            "unlimited": {"title": "Geen Limieten", "desc": "Vergelijk teksten van elke lengte zonder paginaverversingen of tekenbeperkingen."},
            "accurate": {"title": "Regel-voor-Regel Nauwkeurigheid", "desc": "Gebruikt geavanceerde algoritmen om zelfs de kleinste wijzigingen tussen twee versies te detecteren."},
            "free": {"title": "100% Gratis", "desc": "Hoogwaardige tool voor bestandsvergelijking gratis beschikbaar, zonder registratie."}
        },
        "uses": {
            "code": {"title": "Code Review", "desc": "Vergelijk codefragmenten om bugs te vinden, wijzigingen te beoordelen of implementatieverschillen te begrijpen."},
            "document": {"title": "Documentrevisies", "desc": "Volg eenvoudig wijzigingen tussen twee versies van een document, contract of artikel."},
            "config": {"title": "Configuratiebestanden", "desc": "Spoor verschillen op in JSON-, YAML- of .env-bestanden die mogelijk systeemfouten veroorzaken."},
            "merge": {"title": "Handmatig Samenvoegen", "desc": "Beoordeel en voeg wijzigingen van twee verschillende bronnen samen zonder ingewikkelde Git-tools."},
            "backup": {"title": "Back-upverificatie", "desc": "Zorg ervoor dat uw back-ups identiek zijn of identificeer wat er is gewijzigd sinds de laatste opslag."},
            "translation": {"title": "Vertaling Controle", "desc": "Vergelijk originele en vertaalde tekstblokken om structuur- en lengteconsistentie te waarborgen."}
        },
        "how_steps": {
            "1": {"title": "Plak Originele Tekst", "desc": "Voer uw basistekst of code in het veld 'Originele tekst' aan de linkerkant in."},
            "2": {"title": "Plak Gewijzigde Tekst", "desc": "Voer de versie die u wilt vergelijken in het veld 'Gewijzigde tekst' aan de rechterkant in."},
            "3": {"title": "Klik op Vergelijken", "desc": "Druk op de knop 'Bestanden vergelijken' om het analyseproces te starten."},
            "4": {"title": "Beoordeel Verschillen", "desc": "Bekijk de resultaten hieronder. Groene regels zijn toegevoegd, rode regels zijn verwijderd."}
        },
        "faq": {
            "q1": "Zijn mijn tekstgegevens veilig?",
            "a1": "Absoluut. Deze tool draait volledig aan de client-side met JavaScript. Er worden geen gegevens naar onze servers verzonden.",
            "q2": "Welke formaten worden ondersteund?",
            "a2": "U kunt alle platte tekstinhoud vergelijken, inclusief broncode (PHP, JS, Python) en standaard tekstdocumenten.",
            "q3": "Kan het Word- of PDF-bestanden vergelijken?",
            "a3": "Momenteel moet u de tekst uit die bestanden kopiëren en hier plakken. We werken aan ondersteuning voor directe bestandsupload.",
            "q4": "Detecteert het verplaatste regels?",
            "a4": "De huidige versie richt zich op toevoegingen en verwijderingen. Verplaatste regels verschijnen als verwijdering op de ene plek en toevoeging op de andere.",
            "q5": "Is er een groottelimiet?",
            "a5": "De enige limiet is het geheugen van uw browser. De meeste standaarddocumenten worden bijna direct vergeleken."
        }
    },
    'no': {
        "features": {
            "visual": {"title": "Visuell sammenligning", "desc": "Se forskjeller tydelig med fargekodet utheving for lagt til og fjernede linjer."},
            "instant": {"title": "Øyeblikkelige resultater", "desc": "Få umiddelbare resultater så snart du klikker på sammenlign, ingen ventetid."},
            "privacy": {"title": "Personvern beskyttet", "desc": "All behandling skjer i nettleseren din. Filene dine blir aldri sendt til våre servere."},
            "unlimited": {"title": "Ingen grenser", "desc": "Sammenlign tekst av hvilken som helst lengde uten sideinnlasting eller tegnbegrensninger."},
            "accurate": {"title": "Linje-for-linje nøyaktighet", "desc": "Bruker avanserte algoritmer for å oppdage selv de minste endringer mellom to versjoner."},
            "free": {"title": "100% Gratis", "desc": "Veksøy for sammenligning av filer av høy kvalitet tilgjengelig gratis, uten registrering."}
        },
        "uses": {
            "code": {"title": "Kodegjennomgang", "desc": "Sammenlign kodesnutter for å finne feil, gjennomgå endringer eller forstå implementeringsforskjeller."},
            "document": {"title": "Dokumentrevisjoner", "desc": "Spor endringer mellom to versjoner av et dokument, en kontrakt eller en artikkel enkelt."},
            "config": {"title": "Konfigurasjonsfiler", "desc": "Finn forskjeller i JSON-, YAML- eller .env-filer som kan forårsake systemfeil."},
            "merge": {"title": "Manuell fletting", "desc": "Gå gjennom og flett endringer fra to forskjellige kilder uten kompliserte Git-verktøy."},
            "backup": {"title": "Sikkerhetskopiverifisering", "desc": "Sørg for at sikkerhetskopiene dine er identiske, eller identifiser hva som er endret siden forrige lagring."},
            "translation": {"title": "Oversettelseskontroll", "desc": "Sammenlign originale og oversatte tekstblokker for å sikre struktur og lengde konsistens."}
        },
        "how_steps": {
            "1": {"title": "Lim inn originaltekst", "desc": "Skriv inn basisteksten eller koden din i feltet 'Originaltekst' til venstre."},
            "2": {"title": "Lim inn endret tekst", "desc": "Skriv inn versjonen du vil sammenligne i feltet 'Endret tekst' til høyre."},
            "3": {"title": "Klikk på Sammenlign", "desc": "Trykk på knappen 'Sammenlign filer' for å starte analyseprosessen."},
            "4": {"title": "Gjennomgå forskjeller", "desc": "Se resultatene nedenfor. Grønne linjer er lagt til, røde linjer er fjernet."}
        },
        "faq": {
            "q1": "Er tekstdataene mine trygge?",
            "a1": "Absolutt. Dette verktøyet kjører helt i nettleseren ved hjelp av JavaScript. Ingen data blir sendt til våre servere.",
            "q2": "Hvilke formater støttes?",
            "a2": "Du kan sammenligne alt vanlig tekstinnhold, inkludrer kildekode (PHP, JS, Python) og standard tekstdokumenter.",
            "q3": "Kan det sammenligne Word- eller PDF-filer?",
            "a3": "For øyeblikket må du kopiere teksten fra disse filene og lime den inn her. Vi jobber med støtte for direkte filopplasting.",
            "q4": "Oppdager det flyttede linjer?",
            "a4": "Den nåværende versjonen fokuserer på tillegg og slettinger. Flyttede linjer vil vises som en sletting ett sted og et tillegg et annet.",
            "q5": "Er det en størrelsesgrense?",
            "a5": "Den eneste grensen er nettleserens minne. De fleste standarddokumenter sammenlignes nesten umiddelbart."
        }
    }
}

for locale, data in translations.items():
    update_translation(locale, data)

print("Batch 2 updates complete!")
