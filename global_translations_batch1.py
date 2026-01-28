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

# Batch 1: ar, cs, da, de, es, fr
translations = {
    'ar': {
        "features": {
            "visual": {"title": "المقارنة البصرية", "desc": "شاهد الاختلافات بوضوح مع تمييز لوني للأسطر المضافة والمحذوفة."},
            "instant": {"title": "نتائج فورية", "desc": "احصل على نتائج فورية بمجرد النقر على المقارنة، لا داعي للانتظار."},
            "privacy": {"title": "خصوصية محمية", "desc": "تتم جميع المعالجة في متصفحك. لا يتم إرسال ملفاتك ونصوصك إلى خوادمنا."},
            "unlimited": {"title": "بلا حدود", "desc": "قارن النصوص بأي طول دون إعادة تحميل الصفحة أو قيود على الأحرف."},
            "accurate": {"title": "دقة خطوة بخطوة", "desc": "يستخدم خوارزميات متقدمة لاكتشاف حتى أصغر التغييرات بين نسختين."},
            "free": {"title": "مجاني 100%", "desc": "أداة مقارنة ملفات عالية الجودة متاحة دون تكلفة، دون الحاجة للتسجيل."}
        },
        "uses": {
            "code": {"title": "مراجعة الكود", "desc": "قارن بين مقتطفات الكود للعثور على الأخطاء أو مراجعة التغييرات."},
            "document": {"title": "مراجعات المستندات", "desc": "تتبع التغييرات بين نسختين من المستند أو العقد أو المقال بسهولة."},
            "config": {"title": "ملفات الموقع", "desc": "اكتشف الاختلافات في ملفات JSON أو YAML أو .env التي قد تسبب أخطاء."},
            "merge": {"title": "الدمج اليدوي", "desc": "راجع وادمج التغييرات من مصدرين مختلفين دون أدوات Git المعقدة."},
            "backup": {"title": "التحقق من النسخ الاحتياطي", "desc": "تأكد من أن نسخك الاحتياطية متطابقة أو حدد ما تغير منذ آخر حفظ."},
            "translation": {"title": "فحص الترجمة", "desc": "قارن بين كتل النصوص الأصلية والمترجمة لضمان تناسق الهيكل والطول."}
        },
        "how_steps": {
            "1": {"title": "الصق النص الأصلي", "desc": "أدخل النص الأساسي أو الكود في حقل 'النص الأصلي' على اليسار."},
            "2": {"title": "الصق النص المعدل", "desc": "أدخل النسخة التي تريد مقارنتها في حقل 'النص المعدل' على اليمين."},
            "3": {"title": "انقر على مقارنة", "desc": "اضغط على زر 'مقارنة الملفات' لبدء عملية التحليل."},
            "4": {"title": "مراجعة الاختلافات", "desc": "شاهد النتائج أدناه. الأسطر الخضراء مضافة، والأسطر الحمراء محذوفة."}
        },
        "faq": {
            "q1": "هل بياناتي النصية آمنة؟",
            "a1": "بالتأكيد. تعمل هذه الأداة بالكامل في المتصفح باستخدام JavaScript. لا يتم إرسال البيانات إلى خوادمنا.",
            "q2": "ما هي التنسيقات التي تدعمها؟",
            "a2": "يمكنك مقارنة أي محتوى نصي، بما في ذلك الكود المصدري (PHP, JS, Python) وملفات المستندات القياسية.",
            "q3": "هل يمكن مقارنة ملفات Word أو PDF؟",
            "a3": "حالياً، ستحتاج لنسخ النص من تلك الملفات ولصقه هنا. نحن نعمل على دعم رفع الملفات المباشر.",
            "q4": "هل تكتشف الأسطر المنقولة؟",
            "a4": "النسخة الحالية تركز على الإضافات والحذف. ستظهر الأسطر المنقولة كحذف في مكان وإضافة في آخر.",
            "q5": "هل هناك حد للحجم؟",
            "a5": "الحد الوحيد هو ذاكرة متصفحك. معظم المستندات وملفات الكود تقارن فورياً."
        }
    },
    'cs': {
        "features": {
            "visual": {"title": "Vizuální srovnání", "desc": "Jasně vidíte rozdíly díky barevnému zvýraznění přidaných a odstraněných řádků."},
            "instant": {"title": "Okamžité výsledky", "desc": "Získejte okamžité výsledky porovnání ihned po kliknutí, žádné čekání."},
            "privacy": {"title": "Soukromí chráněno", "desc": "Všechno zpracování probíhá ve vašem prohlížeči. Vaše soubory se nikdy neposílají na naše servery."},
            "unlimited": {"title": "Bez limitů", "desc": "Porovnávejte text libovolné délky bez nutnosti načítání stránky nebo omezení znaků."},
            "accurate": {"title": "Přesnost řádek po řádku", "desc": "Používá pokročilé algoritmy k detekci i těch nejmenších změn mezi dvěma verzemi."},
            "free": {"title": "100% Zdarma", "desc": "Kvalitní nástroj pro porovnávání souborů dostupný zdarma, bez nutnosti registrace."}
        },
        "uses": {
            "code": {"title": "Revize kódu", "desc": "Porovnejte úryvky kódu pro nalezení chyb, revizi změn nebo pochopení rozdílů v implementaci."},
            "document": {"title": "Revize dokumentů", "desc": "Snadno sledujte změny mezi dvěma verzemi dokumentu, smlouvy nebo článku."},
            "config": {"title": "Konfigurační soubory", "desc": "Najděte rozdíly v souborech JSON, YAML nebo .env, které mohou způsobovat chyby systému."},
            "merge": {"title": "Ruční slučování", "desc": "Zkontrolujte a slučte změny ze dvou různých zdrojů bez složitých nástrojů Git."},
            "backup": {"title": "Ověření záloh", "desc": "Ujistěte se, že jsou vaše zálohy identické, nebo zjistěte, co se od posledního uložení změnilo."},
            "translation": {"title": "Kontrola překladu", "desc": "Porovnejte originální a přeložené bloky textu pro zajištění konzistence struktury a délky."}
        },
        "how_steps": {
            "1": {"title": "Vložte původní text", "desc": "Zadejte svůj základní text nebo kód do pole 'Původní text' vlevo."},
            "2": {"title": "Vložte upravený text", "desc": "Zadejte verzi, se kterou chcete porovnávat, do pole 'Upravený text' vpravo."},
            "3": {"title": "Klikněte na Porovnat", "desc": "Stiskněte tlačítko 'Porovnat soubory' pro spuštění procesu analýzy."},
            "4": {"title": "Zkontrolujte rozdíly", "desc": "Výsledky uvidíte níže. Zelené řádky jsou přidané, červené jsou smazané."}
        },
        "faq": {
            "q1": "Jsou moje textová data v bezpečí?",
            "a1": "Absolutně. Tento nástroj běží zcela na straně klienta pomocí JavaScriptu. Žádná data se neposílají na naše servery.",
            "q2": "Jaké formáty podporuje?",
            "a2": "Můžete porovnávat jakýkoli čistý textový obsah, včetně zdrojového kódu (PHP, JS, Python) a konfiguračních souborů.",
            "q3": "Lze porovnávat soubory Word nebo PDF?",
            "a3": "V současné době musíte text z těchto souborů zkopírovat a vložit sem. Pracujeme na podpoře přímého nahrávání souborů.",
            "q4": "Detekuje přesunuté řádky?",
            "a4": "Současná verze se zaměřuje na přidávání a mazání. Přesunuté řádky se zobrazí jako smazání na jednom místě a přidání na druhém.",
            "q5": "Existuje limit velikosti?",
            "a5": "Jediným limitem je paměť vašeho prohlížeče. Většina standardních dokumentů se porovná téměř okamžitě."
        }
    },
    'da': {
        "features": {
            "visual": {"title": "Visuel sammenligning", "desc": "Se forskelle tydeligt med farvekodet fremhævning for tilføjede og fjernede linjer."},
            "instant": {"title": "Øjeblikkelige resultater", "desc": "Få øjeblikkelige resultater så snart du klikker på sammenlign, ingen ventetid."},
            "privacy": {"title": "Privatliv beskyttet", "desc": "Al behandling sker i din browser. Dine filer og tekst bliver aldrig sendt til vores servere."},
            "unlimited": {"title": "Ingen grænser", "desc": "Sammenlign tekst af enhver længde uden sidegenindlæsninger eller tegnbegrænsninger."},
            "accurate": {"title": "Linje-for-linje nøjagtighed", "desc": "Bruger avancerede algoritmer til at registrere selv de mindste ændringer mellem to versioner."},
            "free": {"title": "100% Gratis", "desc": "Højkvalitets filsammenligningsværktøj tilgængeligt gratis, uden behov for registrering."}
        },
        "uses": {
            "code": {"title": "Kodegennemgang", "desc": "Sammenlign kodestykker for at finde fejl, gennemgå ændringer eller forstå implementeringsforskelle."},
            "document": {"title": "Dokumentrevisioner", "desc": "Spor nemt ændringer mellem to versioner af et dokument, en kontrakt eller en artikel."},
            "config": {"title": "Konfigurationsfiler", "desc": "Find forskelle i JSON, YAML eller .env filer, der kan forårsage systemfejl."},
            "merge": {"title": "Manuel fletning", "desc": "Gennemse og flet ændringer fra to forskellige kilder uden komplicerede Git-værktøjer."},
            "backup": {"title": "Bekræftelse af sikkerhedskopi", "desc": "Sørg for, at dine sikkerhedskopier er identiske, eller identificer hvad der er ændret siden sidste gemning."},
            "translation": {"title": "Oversættelsestjek", "desc": "Sammenlign originale og oversatte tekstblokke for at sikre struktur og længde konsistens."}
        },
        "how_steps": {
            "1": {"title": "Indsæt original tekst", "desc": "Indtast din basistekst eller kode i feltet 'Original tekst' til venstre."},
            "2": {"title": "Indsæt ændret tekst", "desc": "Indtast den version, du vil sammenligne den med, i feltet 'Ændret tekst' til højre."},
            "3": {"title": "Klik på Sammenlign", "desc": "Tryk på knappen 'Sammenlign filer' for at starte analyseprocessen."},
            "4": {"title": "Gennemse forskelle", "desc": "Se resultaterne nedenfor. Grønne linjer er tilføjet, røde linjer er fjernet."}
        },
        "faq": {
            "q1": "Er mine tekstdata sikre?",
            "a1": "Absolut. Dette værktøj kører helt i din browser ved hjælp af JavaScript. Ingen data sendes til vores servere.",
            "q2": "Hvilke formater understøttes?",
            "a2": "Du kan sammenligne alt almindeligt tekstindhold, herunder kildekode (PHP, JS, Python) og konfigurationsfiler.",
            "q3": "Kan det sammenligne Word eller PDF-filer?",
            "a3": "I øjeblikket skal du kopiere teksten fra disse filer og indsætte den her. Vi arbejder på direkte filupload support.",
            "q4": "Registrerer det flyttede linjer?",
            "a4": "Den nuværende version fokuserer på tilføjelser og sletninger. Flyttede linjer vil blive vist som en sletning ét sted og en tilføjelse et andet.",
            "q5": "Er der en størrelsesgrænse?",
            "a5": "Den eneste grænse er din browsers hukommelse. De fleste standarddokumenter og kodefiler sammenlignes næsten øjeblikkeligt."
        }
    },
    'de': {
        "features": {
            "visual": {"title": "Visueller Vergleich", "desc": "Erkennen Sie Unterschiede deutlich mit farbkodierter Hervorhebung für hinzugefügte und entfernte Zeilen."},
            "instant": {"title": "Sofortige Ergebnisse", "desc": "Erhalten Sie sofortige Diff-Ergebnisse, sobald Sie auf Vergleichen klicken, ohne Wartezeit."},
            "privacy": {"title": "Datenschutz gewährleistet", "desc": "Die gesamte Verarbeitung erfolgt in Ihrem Browser. Ihre Dateien werden niemals an unsere Server gesendet."},
            "unlimited": {"title": "Keine Grenzen", "desc": "Vergleichen Sie Texte beliebiger Länge ohne Neuladen der Seite oder Zeichenbeschränkungen."},
            "accurate": {"title": "Zeilengenaue Präzision", "desc": "Verwendet fortschrittliche Algorithmen, um selbst kleinste Änderungen zwischen zwei Versionen zu erkennen."},
            "free": {"title": "100% Kostenlos", "desc": "Hochwertiges Dateivergleichstool kostenlos verfügbar, ohne Registrierung erforderlich."}
        },
        "uses": {
            "code": {"title": "Code-Review", "desc": "Vergleichen Sie Code-Snippets, um Fehler zu finden, Änderungen zu überprüfen oder Implementierungsunterschiede zu verstehen."},
            "document": {"title": "Dokumentenrevisionen", "desc": "Verfolgen Sie Änderungen zwischen zwei Versionen eines Dokuments, Vertrags oder Artikels ganz einfach."},
            "config": {"title": "Konfigurationsdateien", "desc": "Erkennen Sie Unterschiede in JSON-, YAML- oder .env-Dateien, die Systemfehler verursachen könnten."},
            "merge": {"title": "Manuelles Zusammenführen", "desc": "Überprüfen und führen Sie Änderungen aus zwei verschiedenen Quellen ohne komplizierte Git-Tools zusammen."},
            "backup": {"title": "Backup-Überprüfung", "desc": "Stellen Sie sicher, dass Ihre Backups identisch sind oder identifizieren Sie, was sich seit der letzten Speicherung geändert hat."},
            "translation": {"title": "Übersetzungsprüfung", "desc": "Vergleichen Sie Original- und übersetzte Textblöcke, um Struktur- und Längenkonsistenz sicherzustellen."}
        },
        "how_steps": {
            "1": {"title": "Originaltext einfügen", "desc": "Geben Sie Ihren Basistext oder Code in das Feld 'Originaltext' auf der linken Seite ein."},
            "2": {"title": "Geänderten Text einfügen", "desc": "Geben Sie die Version, die Sie vergleichen möchten, in das Feld 'Geänderter Text' auf der rechten Seite ein."},
            "3": {"title": "Vergleichen klicken", "desc": "Drücken Sie die Taste 'Dateien vergleichen', um den Analyseprozess zu starten."},
            "4": {"title": "Unterschiede prüfen", "desc": "Sehen Sie die Ergebnisse unten. Grüne Zeilen sind hinzugefügt, rote Zeilen sind entfernt."}
        },
        "faq": {
            "q1": "Sind meine Textdaten sicher?",
            "a1": "Absolut. Dieses Tool läuft vollständig clientseitig mit JavaScript. Es werden keine Daten an unsere Server übertragen oder irgendwo gespeichert.",
            "q2": "Welche Formate werden unterstützt?",
            "a2": "Sie können jeden einfachen Textinhalt vergleichen, einschließlich Quellcode (PHP, JS, Python) und Standard-Textdokumenten.",
            "q3": "Kann es Word- oder PDF-Dateien vergleichen?",
            "a3": "Derzeit müssen Sie den Text aus diesen Dateien kopieren und hier einfügen. Wir arbeiten an der Unterstützung von direktem Datei-Upload.",
            "q4": "Erkennt es verschobene Zeilen?",
            "a4": "Die aktuelle Version konzentriert sich auf Hinzufügungen und Löschungen. Verschobene Zeilen werden als Löschung an einer Stelle und Hinzufügung an einer anderen angezeigt.",
            "q5": "Gibt es eine Größenbeschränkung?",
            "a5": "Die einzige Grenze ist der Speicher Ihres Browsers. Die meisten Standarddokumente werden fast sofort verglichen."
        }
    },
    'es': {
        "features": {
            "visual": {"title": "Comparación visual", "desc": "Vea claramente las diferencias con el resaltado por colores para las líneas añadidas y eliminadas."},
            "instant": {"title": "Resultados instantáneos", "desc": "Obtenga resultados inmediatos de la comparación nada más hacer clic, sin esperas."},
            "privacy": {"title": "Privacidad protegida", "desc": "Todo el procesamiento ocurre en su navegador. Sus archivos y texto nunca se envían a nuestros servidores."},
            "unlimited": {"title": "Sin límites", "desc": "Compare textos de cualquier longitud sin recargas de página ni restricciones de caracteres."},
            "accurate": {"title": "Precisión línea por línea", "desc": "Utiliza algoritmos avanzados para detectar hasta los cambios más pequeños entre dos versiones."},
            "free": {"title": "100% Gratis", "desc": "Herramienta de comparación de archivos de alta calidad disponible sin coste y sin necesidad de registro."}
        },
        "uses": {
            "code": {"title": "Revisión de código", "desc": "Compare fragmentos de código para encontrar errores, revisar cambios o entender diferencias de implementación."},
            "document": {"title": "Revisiones de documentos", "desc": "Siga los cambios entre dos versiones de un documento, contrato o artículo fácilmente."},
            "config": {"title": "Archivos de configuración", "desc": "Detecte diferencias en archivos JSON, YAML o .env que podrían estar causando errores en el sistema."},
            "merge": {"title": "Fusión manual", "desc": "Revise y fusione cambios de dos fuentes diferentes sin complicadas herramientas de Git."},
            "backup": {"title": "Verificación de copias de seguridad", "desc": "Asegúrese de que sus copias de seguridad son idénticas o identifique qué ha cambiado desde el último guardado."},
            "translation": {"title": "Verificación de traducción", "desc": "Compare bloques de texto originales y traducidos para asegurar la consistencia de estructura y longitud."}
        },
        "how_steps": {
            "1": {"title": "Pegue el texto original", "desc": "Introduzca su texto base o código en el campo 'Texto original' a la izquierda."},
            "2": {"title": "Pegue el texto modificado", "desc": "Introduzca la versión que desea comparar en el campo 'Texto modificado' a la derecha."},
            "3": {"title": "Haga clic en Comparar", "desc": "Pulse el botón 'Comparar archivos' para iniciar el proceso de análisis."},
            "4": {"title": "Revise las diferencias", "desc": "Vea los resultados a continuación. Las líneas verdes son las añadidas, las rojas las eliminadas."}
        },
        "faq": {
            "q1": "¿Son seguros mis datos de texto?",
            "a1": "Absolutamente. Esta herramienta funciona completamente en el lado del cliente mediante JavaScript. No se envía ningún dato a nuestros servidores.",
            "q2": "¿Qué formatos admite?",
            "a2": "Puede comparar cualquier contenido de texto plano, incluyendo código fuente (PHP, JS, Python) y archivos de texto estándar.",
            "q3": "¿Puede comparar archivos Word o PDF?",
            "a3": "Actualmente, debe copiar el texto de esos archivos y pegarlo aquí. Estamos trabajando en el soporte para la carga directa de archivos.",
            "q4": "¿Detecta líneas movidas?",
            "a4": "La versión actual se centra en las adiciones y eliminaciones. Las líneas movidas se mostrarán como una eliminación en un lugar y una adición en otro.",
            "q5": "¿Hay un límite de tamaño?",
            "a5": "El único límite es la memoria de su navegador. La mayoría de los documentos estándar se comparan casi instantáneamente."
        }
    },
    'fr': {
        "features": {
            "visual": {"title": "Comparaison visuelle", "desc": "Visualisez clairement les différences grâce au surlignage coloré des lignes ajoutées et supprimées."},
            "instant": {"title": "Résultats instantanés", "desc": "Obtenez des résultats immédiats dès que vous cliquez sur comparer, pas d'attente."},
            "privacy": {"title": "Confidentialité protégée", "desc": "Tous les traitements s'effectuent dans votre navigateur. Vos fichiers ne sont jamais envoyés sur nos serveurs."},
            "unlimited": {"title": "Sans limites", "desc": "Comparez des textes de n'importe quelle longueur sans rechargement de page ni restriction de caractères."},
            "accurate": {"title": "Précision ligne par ligne", "desc": "Utilise des algorithmes avancés pour détecter les moindres changements entre deux versions."},
            "free": {"title": "100% Gratuit", "desc": "Outil de comparaison de fichiers de haute qualité disponible gratuitement, sans inscription requise."}
        },
        "uses": {
            "code": {"title": "Revue de code", "desc": "Comparez des fragments de code pour trouver des bugs, réviser des changements ou comprendre des différences d'implémentation."},
            "document": {"title": "Révisions de documents", "desc": "Suivez facilement les changements entre deux versions d'un document, d'un contrat ou d'un article."},
            "config": {"title": "Fichiers de configuration", "desc": "Repérez les différences dans les fichiers JSON, YAML ou .env qui pourraient causer des erreurs système."},
            "merge": {"title": "Fusion manuelle", "desc": "Examinez et fusionnez des changements provenant de deux sources différentes sans outils Git complexes."},
            "backup": {"title": "Vérification de sauvegarde", "desc": "Assurez-vous que vos sauvegardes sont identiques ou identifiez ce qui a changé depuis le dernier enregistrement."},
            "translation": {"title": "Vérification de traduction", "desc": "Comparez les blocs de texte originaux et traduits pour garantir la cohérence de la structure et de la longueur."}
        },
        "how_steps": {
            "1": {"title": "Coller le texte original", "desc": "Saisissez votre texte de base ou code dans le champ 'Texte original' à gauche."},
            "2": {"title": "Coller le texte modifié", "desc": "Saisissez la version que vous souhaitez comparer dans le champ 'Texte modifié' à droite."},
            "3": {"title": "Cliquer sur Comparer", "desc": "Appuyez sur le bouton 'Comparer les fichiers' pour lancer le processus d'analyse."},
            "4": {"title": "Examiner les différences", "desc": "Consultez les résultats ci-dessous. Les lignes vertes sont les ajouts, les rouges les suppressions."}
        },
        "faq": {
            "q1": "Mes données textuelles sont-elles sécurisées ?",
            "a1": "Absolument. Cet outil s'exécute entièrement côté client via JavaScript. Aucune donnée n'est transmise à nos serveurs.",
            "q2": "Quels formats sont supportés ?",
            "a2": "Vous pouvez comparer tout contenu en texte brut, y compris le code source (PHP, JS, Python) et les documents texte standard.",
            "q3": "Peut-il comparer des fichiers Word ou PDF ?",
            "a3": "Actuellement, vous devez copier le texte de ces fichiers et le coller ici. Nous travaillons sur le support du téléchargement direct de fichiers.",
            "q4": "Détecte-t-il les lignes déplacées ?",
            "a4": "La version actuelle se concentre sur les ajouts et les suppressions. Les lignes déplacées apparaîtront comme une suppression à un endroit et un ajout à un autre.",
            "q5": "Y a-t-il une limite de taille ?",
            "a5": "La seule limite est la mémoire de votre navigateur. La plupart des documents standards sont comparés presque instantanément."
        }
    }
}

for locale, data in translations.items():
    update_translation(locale, data)

print("Batch 1 updates complete!")
