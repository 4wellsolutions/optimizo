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

# Batch 3: pl, pt, ro, ru, sv, vi, zh
translations = {
    'pl': {
        "features": {
            "visual": {"title": "Porównanie wizualne", "desc": "Wyraźnie zobacz różnice dzięki kolorowemu wyróżnieniu dodanych i usuniętych linii."},
            "instant": {"title": "Natychmiastowe wyniki", "desc": "Uzyskaj natychmiastowe wyniki porównania zaraz po kliknięciu, bez czekania."},
            "privacy": {"title": "Prywatność chroniona", "desc": "Całe przetwarzanie odbywa się w Twojej przeglądarce. Twoje pliki nigdy nie trafiają na nasze serwery."},
            "unlimited": {"title": "Bez limitów", "desc": "Porównuj teksty o dowolnej długości bez przeładowywania strony i ograniczeń znaków."},
            "accurate": {"title": "Dokładność linia po linii", "desc": "Wykorzystuje zaawansowane algorytmy do wykrywania nawet najmniejszych zmian między wersjami."},
            "free": {"title": "100% Darmowe", "desc": "Wysokiej jakości narzędzie do porównywania plików dostępne bezpłatnie, bez rejestracji."}
        },
        "uses": {
            "code": {"title": "Przegląd kodu", "desc": "Porównuj fragmenty kodu, aby znaleźć błędy, przejrzeć zmiany lub zrozumieć różnice w implementacji."},
            "document": {"title": "Rewizje dokumentów", "desc": "Łatwo śledź zmiany między dwiema wersjami dokumentu, umowy lub artykułu."},
            "config": {"title": "Pliki konfiguracyjne", "desc": "Znajdź różnice w plikach JSON, YAML lub .env, które mogą powodować błędy systemowe."},
            "merge": {"title": "Ręczne scalanie", "desc": "Przejrzyj i scal zmiany z dwóch różnych źródeł bez skomplikowanych narzędzi Git."},
            "backup": {"title": "Weryfikacja kopii zapasowych", "desc": "Upewnij się, że Twoje kopie zapasowe są identyczne lub zidentyfikuj zmiany od ostatniego zapisu."},
            "translation": {"title": "Kontrola tłumaczenia", "desc": "Porównaj oryginalne i przetłumaczone bloki tekstu, aby zapewnić spójność struktury i długości."}
        },
        "how_steps": {
            "1": {"title": "Wklej tekst oryginalny", "desc": "Wprowadź tekst bazowy lub kod w polu 'Tekst oryginalny' po lewej stronie."},
            "2": {"title": "Wklej tekst zmodyfikowany", "desc": "Wprowadź wersję do porównania w polu 'Tekst zmodyfikowany' po prawej stronie."},
            "3": {"title": "Kliknij Porównaj", "desc": "Naciśnij przycisk 'Porównaj pliki', aby rozpocząć proces analizy."},
            "4": {"title": "Przejrzyj różnice", "desc": "Zobacz wyniki poniżej. Zielone linie to dodatki, czerwone to usunięcia."}
        },
        "faq": {
            "q1": "Czy moje dane tekstowe są bezpieczne?",
            "a1": "Absolutnie. Narzędzie działa w przeglądarce za pomocą JavaScript. Żadne dane nie trafiają na nasze serwery.",
            "q2": "Jakie formaty są obsługiwane?",
            "a2": "Możesz porównywać dowolną treść tekstową, w tym kod źródłowy (PHP, JS, Python) i standardowe dokumenty tekstowe.",
            "q3": "Czy można porównywać pliki Word lub PDF?",
            "a3": "Obecnie musisz skopiować tekst z tych plików i wkleić go tutaj. Pracujemy nad obsługą bezpośredniego przesyłania plików.",
            "q4": "Czy wykrywa przeniesione linie?",
            "a4": "Obecna wersja skupia się na dodawaniu i usuwaniu. Przeniesione linie pojawią się jako usunięcie i dodanie w innym miejscu.",
            "q5": "Czy istnieje limit wielkości?",
            "a5": "Jedynym limitem jest pamięć przeglądarki. Większość standardowych dokumentów porównuje się niemal natychmiast."
        }
    },
    'pt': {
        "features": {
            "visual": {"title": "Comparação Visual", "desc": "Veja as diferenças claramente com realce colorido para linhas adicionadas e removidas."},
            "instant": {"title": "Resultados Instantâneos", "desc": "Obtenha resultados imediatos assim que clicar em comparar, sem espera."},
            "privacy": {"title": "Privacidade Protegida", "desc": "Todo o processamento ocorre no seu navegador. Os seus ficheiros nunca são enviados para os nossos servidores."},
            "unlimited": {"title": "Sem Limites", "desc": "Compare textos de qualquer comprimento sem recarregamentos de página ou restrições de caracteres."},
            "accurate": {"title": "Precisão Linha por Linha", "desc": "Utiliza algoritmos avançados para detetar até as mais pequenas alterações entre duas versões."},
            "free": {"title": "100% Gratuito", "desc": "Ferramenta de comparação de ficheiros de alta qualidade disponível sem custos, sem necessidade de registo."}
        },
        "uses": {
            "code": {"title": "Revisão de Código", "desc": "Compare trechos de código para encontrar bugs, rever alterações ou compreender diferenças de implementação."},
            "document": {"title": "Revisões de Documentos", "desc": "Acompanhe facilmente as alterações entre duas versões de um documento, contrato ou artigo."},
            "config": {"title": "Ficheiros de Configuração", "desc": "Detete diferenças em ficheiros JSON, YAML ou .env que possam estar a causar erros no sistema."},
            "merge": {"title": "Fusão Manual", "desc": "Reveja e funda alterações de duas fontes diferentes sem ferramentas Git complicadas."},
            "backup": {"title": "Verificação de Backup", "desc": "Garanta que os seus backups são idênticos ou identifique o que mudou desde a última gravação."},
            "translation": {"title": "Verificação de Tradução", "desc": "Compare blocos de texto originais e traduzidos para garantir a consistência de estrutura e comprimento."}
        },
        "how_steps": {
            "1": {"title": "Cole o Texto Original", "desc": "Introduza o seu texto base ou código no campo 'Texto Original' à esquerda."},
            "2": {"title": "Cole o Texto Modificado", "desc": "Introduza a versão que deseja comparar no campo 'Texto Modificado' à direita."},
            "3": {"title": "Clique em Comparar", "desc": "Pressione o botão 'Comparar Ficheiros' para iniciar o processo de análise."},
            "4": {"title": "Reveja as Diferenças", "desc": "Veja os resultados abaixo. As linhas verdes são adições, as vermelhas são remoções."}
        },
        "faq": {
            "q1": "Os meus dados de texto estão seguros?",
            "a1": "Absolutamente. Esta ferramenta corre inteiramente no lado do cliente via JavaScript. Nenhuns dados são transmitidos para os nossos servidores.",
            "q2": "Que formatos são suportados?",
            "a2": "Pode comparar qualquer conteúdo de texto simples, incluindo código fonte (PHP, JS, Python) e documentos de texto padrão.",
            "q3": "Pode comparar ficheiros Word ou PDF?",
            "a3": "Atualmente, precisa de copiar o texto desses ficheiros e colá-lo aqui. Estamos a trabalhar no suporte para upload direto de ficheiros.",
            "q4": "Deteta linhas movidas?",
            "a4": "A versão atual foca-se em adições e remoções. Linhas movidas aparecerão como uma remoção num local e uma adição noutro.",
            "q5": "Existe um limite de tamanho?",
            "a5": "O único limite é a memória do seu navegador. A maioria dos documentos padrão é comparada quase instantaneamente."
        }
    },
    'ro': {
        "features": {
            "visual": {"title": "Comparație Vizuală", "desc": "Vedeți clar diferențele cu evidențierea colorată pentru liniile adăugate și eliminate."},
            "instant": {"title": "Rezultate Instantanee", "desc": "Obțineți rezultate imediate de îndată ce faceți clic pe compară, fără așteptare."},
            "privacy": {"title": "Confidențialitate Protejată", "desc": "Toată procesarea are loc în browserul dvs. Fișierele dvs. nu sunt trimise niciodată la serverele noastre."},
            "unlimited": {"title": "Fără Limite", "desc": "Comparați texte de orice lungime fără reîncărcări de pagină sau restricții de caractere."},
            "accurate": {"title": "Acuratețe Linie cu Linie", "desc": "Utilizează algoritmi avansați pentru a detecta chiar și cele mai mici schimbări între două versiuni."},
            "free": {"title": "100% Gratuit", "desc": "Instrument de comparare a fișierelor de înaltă calitate disponibil gratuit, fără înregistrare necesară."}
        },
        "uses": {
            "code": {"title": "Revizuirea Codului", "desc": "Comparați fragmente de cod pentru a găsi bug-uri, a revizui schimbările sau a înțelege diferențele de implementare."},
            "document": {"title": "Revizii de Documente", "desc": "Urmăriți cu ușurință schimbările între două versiuniale unui document, contract sau articol."},
            "config": {"title": "Fișiere de Configurare", "desc": "Depistați diferențele în fișierele JSON, YAML sau .env care ar putea cauza erori de sistem."},
            "merge": {"title": "Îmbinare Manuală", "desc": "Revizuiți și îmbinați schimbările din două surse diferite fără instrumente Git complicate."},
            "backup": {"title": "Verificare Backup", "desc": "Asigurați-vă că backup-urile sunt identice sau identificați ce s-a schimbat de la ultima salvare."},
            "translation": {"title": "Verificare Traducere", "desc": "Comparați blocurile de text originale și traduse pentru a asigura consistența structurii și a lungimii."}
        },
        "how_steps": {
            "1": {"title": "Lipiți Textul Original", "desc": "Introduceți textul de bază sau codul în câmpul 'Text Original' din stânga."},
            "2": {"title": "Lipiți Textul Modificat", "desc": "Introduceți versiunea pe care doriți să o comparați în câmpul 'Text Modificat' din dreapta."},
            "3": {"title": "Faceți clic pe Compară", "desc": "Apăsați butonul 'Compară Fișiere' pentru a începe procesul de analiză."},
            "4": {"title": "Revizuiți Diferențele", "desc": "Vedeți rezultatele mai jos. Liniile verzi sunt adăugări, cele roșii sunt eliminări."}
        },
        "faq": {
            "q1": "Sunt datele mele textuale în siguranță?",
            "a1": "Absolut. Acest instrument rulează în întregime pe partea de client folosind JavaScript. Nu sunt transmise date către serverele noastre.",
            "q2": "Ce formate sunt acceptate?",
            "a2": "Puteți compara orice conținut text simplu, inclusiv cod sursă (PHP, JS, Python) și documente text standard.",
            "q3": "Poate compara fișiere Word sau PDF?",
            "a3": "În prezent, trebuie să copiați textul din acele fișiere și să îl lipiți aici. Lucrăm la suportul pentru încărcarea directă a fișierelor.",
            "q4": "Detectează liniile mutate?",
            "a4": "Versiunea actuală se concentrează pe adăugări și eliminări. Liniile mutate vor apărea ca o eliminare într-un loc și o adăugare în altul.",
            "q5": "Există o limită de mărime?",
            "a5": "Singura limită este memoria browserului dvs. Cele mai multe documente sunt comparate aproape instantaneu."
        }
    },
    'ru': {
        "features": {
            "visual": {"title": "Визуальное сравнение", "desc": "Четко видите различия благодаря цветовой подсветке добавленных и удаленных строк."},
            "instant": {"title": "Мгновенные результаты", "desc": "Получайте мгновенные результаты сравнения сразу после нажатия кнопки, без ожидания."},
            "privacy": {"title": "Конфиденциальность защищена", "desc": "Вся обработка происходит в вашем браузере. Ваши файлы никогда не отправляются на наши серверы."},
            "unlimited": {"title": "Без ограничений", "desc": "Сравнивайте тексты любой длины без перезагрузки страниц и ограничений по количеству символов."},
            "accurate": {"title": "Построчная точность", "desc": "Использует передовые алгоритмы для обнаружения даже малейших изменений между двумя версиями."},
            "free": {"title": "100% бесплатно", "desc": "Качественный инструмент сравнения файлов доступен бесплатно, без необходимости регистрации."}
        },
        "uses": {
            "code": {"title": "Ревью кода", "desc": "Сравнивайте фрагменты кода для поиска ошибок, обзора изменений или понимания различий в реализации."},
            "document": {"title": "Ревизии документов", "desc": "Легко отслеживайте изменения между двумя версиями документа, контракта или статьи."},
            "config": {"title": "Конфигурационные файлы", "desc": "Находите различия в файлах JSON, YAML или .env, которые могут вызывать системные ошибки."},
            "merge": {"title": "Ручное слияние", "desc": "Просматривайте и объединяйте изменения из двух разных источников без сложных инструментов Git."},
            "backup": {"title": "Проверка резервных копий", "desc": "Убедитесь, что ваши копии идентичны, или определите, что изменилось с момента последнего сохранения."},
            "translation": {"title": "Проверка перевода", "desc": "Сравнивайте оригинальные и переведенные блоки текста для обеспечения согласованности структуры и длины."}
        },
        "how_steps": {
            "1": {"title": "Вставьте исходный текст", "desc": "Введите базовый текст или код в поле 'Исходный текст' слева."},
            "2": {"title": "Вставьте измененный текст", "desc": "Введите версию для сравнения в поле 'Измененный текст' справа."},
            "3": {"title": "Нажмите 'Сравнить'", "desc": "Нажмите кнопку 'Сравнить файлы', чтобы запустить процесс анализа."},
            "4": {"title": "Просмотрите различия", "desc": "Результаты ниже. Зеленые строки — добавлены, красные — удалены."}
        },
        "faq": {
            "q1": "Безопасны ли мои текстовые данные?",
            "a1": "Абсолютно. Этот инструмент работает полностью в браузере с помощью JavaScript. Данные не передаются на наши серверы.",
            "q2": "Какие форматы поддерживаются?",
            "a2": "Вы можете сравнивать любой текстовый контент, включая исходный код (PHP, JS, Python) и стандартные текстовые документы.",
            "q3": "Можно ли сравнивать файлы Word или PDF?",
            "a3": "В настоящее время вам необходимо скопировать текст из этих файлов и вставить его здесь. Мы работаем над поддержкой прямой загрузки файлов.",
            "q4": "Обнаруживает ли он перемещенные строки?",
            "a4": "Текущая версия фокусируется на добавлении и удалении. Перемещенные строки будут показаны как удаление в одном месте и добавление в другом.",
            "q5": "Есть ли ограничение по размеру?",
            "a5": "Единственное ограничение — это память вашего браузера. Большинство документов сравниваются почти мгновенно."
        }
    },
    'sv': {
        "features": {
            "visual": {"title": "Visuell jämförelse", "desc": "Se skillnader tydligt med färgkodad markering för tillagda och borttagna rader."},
            "instant": {"title": "Omedelbara resultat", "desc": "Få diff-resultat så fort du klickar på jämför, ingen väntetid."},
            "privacy": {"title": "Integritet skyddad", "desc": "All bearbetning sker i din webbläsare. Dina filer skickas aldrig till våra servrar."},
            "unlimited": {"title": "Inga gränser", "desc": "Jämför text av valfri längd utan sidomladdningar eller teckenbegränsningar."},
            "accurate": {"title": "Rad-för-rad precision", "desc": "Använder avancerade algoritmer för att upptäcka även de minsta ändringarna mellan två versioner."},
            "free": {"title": "100% Gratis", "desc": "Högkvalitativt verktyg för filjämförelse tillgängligt utan kostnad, utan registrering."}
        },
        "uses": {
            "code": {"title": "Kodgranskning", "desc": "Jämför kodesnuttar för att hitta buggar, granska ändringar eller förstå implementeringsskillnader."},
            "document": {"title": "Dokumentrevisioner", "desc": "Följ enkelt ändringar mellan två versioner av ett dokument, kontrakt eller en artikel."},
            "config": {"title": "Konfigurationsfiler", "desc": "Hitta skillnader i JSON-, YAML- eller .env-filer som kan orsaka systemfel."},
            "merge": {"title": "Manuell sammanslagning", "desc": "Granska och slå samman ändringar från två olika källor utan komplicerade Git-verktyg."},
            "backup": {"title": "Säkerhetskopieringskontroll", "desc": "Se till att dina säkerhetskopior är identiska eller identifiera vad som har ändrats sedan senaste sparningen."},
            "translation": {"title": "Översättningskontroll", "desc": "Jämför original och översatta textblock för att säkerställa konsistens i struktur och längd."}
        },
        "how_steps": {
            "1": {"title": "Klistra in originaltext", "desc": "Ange din bastext eller kod i fältet 'Originaltext' till vänster."},
            "2": {"title": "Klistra in ändrad text", "desc": "Ange den version du vill jämföra i fältet 'Ändrad text' till höyre."},
            "3": {"title": "Klicka på Jämför", "desc": "Tryck på knappen 'Jämför filer' för att starta analysprocessen."},
            "4": {"title": "Granska skillnader", "desc": "Se resultaten nedan. Gröna rader har lagts till, röda rader har tagits bort."}
        },
        "faq": {
            "q1": "Är mina textdata säkra?",
            "a1": "Absolut. Det här verktyget körs helt i webbläsaren med JavaScript. Inga data skickas till våra servrar.",
            "q2": "Vilka format stöds?",
            "a2": "Du kan jämföra allt vanligt textinnehåll, inklusive källkod (PHP, JS, Python) och vanliga textdokument.",
            "q3": "Kan det jämföra Word- eller PDF-filer?",
            "a3": "För närvarande måste du kopiera texten från dessa filer och klistra in den här. Vi arbetar på stöd för direkt filuppladdning.",
            "q4": "Upptäcker det flyttade rader?",
            "a4": "Den nuvarande versionen fokuserar på tillägg och borttagningar. Flyttade rader visas som en borttagning på ett ställe och ett tillägg på ett annat.",
            "q5": "Finns det en storleksgräns?",
            "a5": "Den enda gränsen är webbläsarens minne. De flesta standarddokument jämförs nästan omedelbart."
        }
    },
    'vi': {
        "features": {
            "visual": {"title": "So sánh trực quan", "desc": "Xem rõ sự khác biệt với đánh dấu mã màu cho các dòng được thêm và xóa."},
            "instant": {"title": "Kết quả tức thì", "desc": "Nhận kết quả so sánh ngay khi bạn nhấp vào so sánh, không phải chờ đợi."},
            "privacy": {"title": "Bảo mật riêng tư", "desc": "Mọi quá trình xử lý diễn ra trong trình duyệt của bạn. Tệp và văn bản không bao giờ được gửi đến máy chủ của chúng tôi."},
            "unlimited": {"title": "Không giới hạn", "desc": "So sánh văn bản ở bất kỳ độ dài nào mà không cần tải lại trang hoặc hạn chế ký tự."},
            "accurate": {"title": "Độ chính xác từng dòng", "desc": "Sử dụng các thuật toán nâng cao để phát hiện ngay cả những thay đổi nhỏ nhất giữa hai phiên bản."},
            "free": {"title": "Miễn phí 100%", "desc": "Công cụ so sánh tệp chất lượng cao được cung cấp miễn phí, không cần đăng ký."}
        },
        "uses": {
            "code": {"title": "Xem xét mã", "desc": "So sánh các đoạn mã để tìm lỗi, xem xét các thay đổi hoặc hiểu sự khác biệt khi triển khai."},
            "document": {"title": "Sửa đổi tài liệu", "desc": "Dễ dàng theo dõi các thay đổi giữa hai phiên bản của tài liệu, hợp đồng hoặc bài báo."},
            "config": {"title": "Tệp cấu hình", "desc": "Phát hiện sự khác biệt trong tệp JSON, YAML hoặc .env có thể gây ra lỗi hệ thống."},
            "merge": {"title": "Hợp nhất thủ công", "desc": "Xem xét và hợp nhất các thay đổi từ hai nguồn khác nhau mà không cần các công cụ Git phức tạp."},
            "backup": {"title": "Xác minh sao lưu", "desc": "Đảm bảo rằng các bản sao lưu giống hệt nhau hoặc xác định những gì đã thay đổi kể từ lần lưu cuối cùng."},
            "translation": {"title": "Kiểm tra bản dịch", "desc": "So sánh văn bản gốc và bản dịch để đảm bảo tính nhất quán về cấu trúc và độ dài."}
        },
        "how_steps": {
            "1": {"title": "Dán văn bản gốc", "desc": "Nhập văn bản cơ sở hoặc mã vào trường 'Văn bản gốc' ở bên trái."},
            "2": {"title": "Dán văn bản đã sửa đổi", "desc": "Nhập phiên bản bạn muốn so sánh vào trường 'Văn bản đã sửa đổi' ở bên phải."},
            "3": {"title": "Nhấp vào So sánh", "desc": "Nhấn nút 'So sánh tệp' để bắt đầu quá trình phân tích."},
            "4": {"title": "Xem xét sự khác biệt", "desc": "Xem kết quả bên dưới. Các dòng màu xanh lá cây là phần bổ sung, dòng màu đỏ là phần bị xóa."}
        },
        "faq": {
            "q1": "Dữ liệu văn bản của tôi có an toàn không?",
            "a1": "Chắc chắn rồi. Công cụ này chạy hoàn toàn phía máy khách bằng JavaScript. Không có dữ liệu nào được truyền đến máy chủ của chúng tôi.",
            "q2": "Công cụ này hỗ trợ những định dạng nào?",
            "a2": "Bạn có thể so sánh bất kỳ nội dung văn bản thuần túy nào, bao gồm mã nguồn (PHP, JS, Python) và các tài liệu văn bản chuẩn.",
            "q3": "Nó có thể so sánh tệp Word hoặc PDF không?",
            "a3": "Hiện tại, bạn cần sao chép văn bản từ các tệp đó và dán vào đây. Chúng tôi đang thực hiện hỗ trợ tải tệp lên trực tiếp.",
            "q4": "Nó có phát hiện được các dòng bị di chuyển không?",
            "a4": "Phiên bản hiện tại tập trung vào việc bổ sung và xóa. Các dòng bị di chuyển sẽ hiển thị dưới dạng bị xóa ở một nơi và được thêm vào ở một nơi khác.",
            "q5": "Cố giới hạn kích thước không?",
            "a5": "Giới hạn duy nhất là bộ nhớ trình duyệt của bạn. Hầu hết các tài liệu tiêu chuẩn sẽ được so sánh gần như ngay lập tức."
        }
    },
    'zh': {
        "features": {
            "visual": {"title": "视觉对比", "desc": "通过新增行和删除行的颜色标记，清晰地查看差异。"},
            "instant": {"title": "即时结果", "desc": "点击对比后立即获得结果，无需等待。"},
            "privacy": {"title": "隐私保护", "desc": "所有处理均在浏览器中进行。您的文件和文本绝不会发送到我们的服务器。"},
            "unlimited": {"title": "无限制", "desc": "对比任意长度的文本，无需刷新页面或受字符限制。"},
            "accurate": {"title": "逐行精确", "desc": "使用先进算法检测两个版本之间最细微的变化。"},
            "free": {"title": "100% 免费", "desc": "高质量的文件对比工具，完全免费，无需注册。"}
        },
        "uses": {
            "code": {"title": "代码审查", "desc": "对比代码片段以查找错误、审查更改或了解实现差异。"},
            "document": {"title": "文档修订", "desc": "轻松跟踪文档、合同或文章两个版本之间的更改。"},
            "config": {"title": "配置文件", "desc": "发现可能导致系统错误的 JSON、YAML 或 .env 文件中的差异。"},
            "merge": {"title": "手动合并", "desc": "无需复杂的 Git 工具，即可查看并合并来自两个不同来源的更改。"},
            "backup": {"title": "备份验证", "desc": "确保备份完全相同，或识别自上次保存以来的更改。"},
            "translation": {"title": "翻译检查", "desc": "对比原文和译文文本块，确保结构和长度的一致性。"}
        },
        "how_steps": {
            "1": {"title": "粘贴原文", "desc": "在左侧的“原文”字段中输入您的基础文本或代码。"},
            "2": {"title": "粘贴修改后的文本", "desc": "在右侧的“修改后的文本”字段中输入您要对比的版本。"},
            "3": {"title": "点击对比", "desc": "按下“对比文件”按钮开始分析过程。"},
            "4": {"title": "查看差异", "desc": "在下方查看结果。绿色行表示新增，红色行表示删除。"}
        },
        "faq": {
            "q1": "我的文本数据安全吗？",
            "a1": "绝对安全。此工具完全通过 JavaScript 在客户端运行。数据不会上传到我们的服务器或存储在任何地方。",
            "q2": "支持哪些格式？",
            "a2": "您可以对比任何纯文本内容，包括源代码（PHP、JS、Python）和标准文本文件。",
            "q3": "可以对比 Word 或 PDF 文件吗？",
            "a3": "目前您需要从这些文件中复制文本并粘贴到此处。我们正在开发直接文件上传支持。",
            "q4": "它能检测移动的行吗？",
            "a4": "当前版本专注于新增和删除。移动的行将显示为一个地方的删除和另一个地方的新增。",
            "q5": "有大小限制吗？",
            "a5": "唯一的限制是您浏览器的内存。大多数标准文档和代码文件几乎可以即时完成对比。"
        }
    }
}

for locale, data in translations.items():
    update_translation(locale, data)

print("Batch 3 updates complete!")
